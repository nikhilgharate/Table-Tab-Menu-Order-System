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

/**
 * Created by admin on 4/23/2018.
 */

public class SubmitOreder extends AsyncTask<String,Void,String> {
    private Context ctx;
    String pun;
    public SubmitOreder(Context context){
        this.ctx=context;
    }
    @Override
    protected String doInBackground(String... strings) {
        String mb = strings[0];
        pun=mb;
        String mn = strings[1];
        String qt = strings[2];
        String rt = strings[3];
        String am = strings[4];
        String link;
        String data;
        BufferedReader bufferedReader;
        String result;

        DateFormat dateFormat=new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
        Date date = new Date();
        String sd=dateFormat.format(date).toString();
//https://khandeshiit.com/tabletop/insertorder.php?mdate=12&mobno=111&mname=idli&qty=1&rate=100&amount=100

        try {
            data = "?mdate=" + URLEncoder.encode(sd,"UTF-8");
            data += "&mobno=" + URLEncoder.encode(mb, "UTF-8");
            data += "&mname=" + URLEncoder.encode(mn, "UTF-8");
            data += "&qty=" + URLEncoder.encode(qt, "UTF-8");
            data += "&rate=" + URLEncoder.encode(rt, "UTF-8");
            data += "&amount=" + URLEncoder.encode(am, "UTF-8");

            link = "https://studentproject.co.in/api/insertorder.php" + data;
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
                    Toast.makeText(ctx ,"Menu Succesfuly Add In Cart "+pun ,Toast.LENGTH_LONG).show();
                    //       ctx.startActivity(new Intent(ctx, AfterLRActivity.class).putExtra("uname",pun));


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

