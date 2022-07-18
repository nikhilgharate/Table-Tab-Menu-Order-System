package com.example.tabletop;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;

public class ConfirmOTP extends AsyncTask<String,Void,String> {

    Context ctx;
    String pun;

    public ConfirmOTP(Context ctx) {
        this.ctx = ctx;
    }

    protected String doInBackground(String... strings) {
        String mobno = strings[0];
        String otp = strings[1];
        String link;
        String data;
        BufferedReader bufferedReader;
        String result;
        try {
            data = "?mobno=" + URLEncoder.encode(mobno, "UTF-8");
            data += "&otp=" + URLEncoder.encode(otp, "UTF-8");

// old link

            //https://khandeshiit.com/tabletop/confirmotp.php?mobno=9370152526&otp=1233

            link = "https://studentproject.co.in/api/confirmotp.php" + data;
            URL url = new URL(link);
            HttpURLConnection con = (HttpURLConnection) url.openConnection();
            bufferedReader = new BufferedReader(new InputStreamReader(con.getInputStream()));
            result = bufferedReader.readLine();
            return result;
        } catch (Exception e) {

            Toast.makeText(ctx,"error "+e.getMessage().toString(), Toast.LENGTH_LONG).show();

            return new String("Exception" + e.getMessage());
        }
    }

    @Override
    protected void onPostExecute(String result) {
        String jsonStr=result;
        if(jsonStr!=null){
            try
            {
                JSONObject jsonObj=new JSONObject(jsonStr);
                String query_result=jsonObj.getString("query_result");
                if(query_result.equals("SUCCESS"))
                {
                    Toast.makeText(ctx ,"OTP Match " ,Toast.LENGTH_LONG).show();
                    ctx.startActivity(new Intent(ctx, MainActivity.class));



                }
                else  if(query_result.equals("FAILURE"))
                {
                    Toast.makeText(ctx,"Invalid OTP ",Toast.LENGTH_LONG).show();
                }

                else
                {
                    Toast.makeText(ctx,"Rec is Not Available ",Toast.LENGTH_LONG).show();
                }
            }
            catch (JSONException e)
            {
                Toast.makeText(ctx,"Internet Issue ",Toast.LENGTH_LONG).show();
            }
        }
        //super.onPostExecute(s);
        else
        {
            Toast.makeText(ctx,"JSON Error ",Toast.LENGTH_LONG).show();
        }
    }
}

