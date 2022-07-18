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
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;

public class delOrder extends AsyncTask<String,Void,String> {
    private Context ctx;
    String pun,tn;
    public delOrder (Context context){
        this.ctx=context;
    }
    @Override
    protected String doInBackground(String... strings) {
        String mn = strings[0];
        String mb = strings[1];
        tn = strings[2];
        pun=mb;

        String link;
        String data;
        BufferedReader bufferedReader;
        String result;



        try {
            data = "?mname=" + URLEncoder.encode(mn, "UTF-8");
            data += "&mobno=" + URLEncoder.encode(mb, "UTF-8");
            //https://khandeshiit.com/tabletop/delo.php?mname=Idli&mobno=9370152526
            link = "https://khandeshiit.com/tabletop/delo.php" + data;
            URL url = new URL(link);
            HttpURLConnection con = (HttpURLConnection) url.openConnection();
            bufferedReader = new BufferedReader(new InputStreamReader(con.getInputStream()));
            result = bufferedReader.readLine();
            return result;
        } catch (Exception e) {
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
                    Toast.makeText(ctx ,"Order Delete  " ,Toast.LENGTH_LONG).show();
                    ctx.startActivity(new Intent(ctx, PaymentActivity.class).putExtra("uname",pun).putExtra("tno",tn));
                }
                else  if(query_result.equals("FAILURE"))
                {
                    Toast.makeText(ctx,"Data could not be insert",Toast.LENGTH_LONG).show();
                }

                else
                {
                    Toast.makeText(ctx,"not connect with database",Toast.LENGTH_LONG).show();
                }
            }
            catch (JSONException e)
            {
                Toast.makeText(ctx,"not fet any json",Toast.LENGTH_LONG).show();
            }
        }
        //super.onPostExecute(s);
        else
        {
            Toast.makeText(ctx,"error parsing json data",Toast.LENGTH_LONG).show();
        }
    }
}
