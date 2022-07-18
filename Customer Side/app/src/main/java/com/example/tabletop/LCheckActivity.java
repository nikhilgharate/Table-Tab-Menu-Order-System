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

    public class LCheckActivity extends AsyncTask<String, Void, String> {
        private Context ctx;
        String pun,tn;

        public LCheckActivity(Context context) {
            this.ctx = context;
        }


        @Override
        protected String doInBackground(String... strings) {
             tn = strings[0];
            String ps = strings[1];
            String link;
            pun = strings[2];
            String data;
            BufferedReader bufferedReader;
            String result;
            //https://studentproject.co.in/api/logchk.php?tno=Tab1&tpass=Tab1

            try {
                data = "?tno=" + URLEncoder.encode(tn, "UTF-8 ");
                data += "&tpass=" + URLEncoder.encode(ps, "UTF-8");
                link = "https://studentproject.co.in/api/logchk.php" + data;
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
            String jsonStr = result;
            if (jsonStr != null) {
                try {
                    JSONObject jsonObj = new JSONObject(jsonStr);
                    String query_result = jsonObj.getString("query_result");
                    if (query_result.equals("SUCCESS")) {
                        Toast.makeText(ctx, "Login Successfully", Toast.LENGTH_LONG).show();
                        ctx.startActivity(new Intent(ctx, Afterlogin.class).putExtra("uname", pun).putExtra("tno",tn));
                    } else if (query_result.equals("FAILURE")) {
                        Toast.makeText(ctx, "Invalid User Name & Password", Toast.LENGTH_LONG).show();
                    } else {
                        Toast.makeText(ctx, "not Connect with database", Toast.LENGTH_LONG).show();
                    }
                } catch (JSONException e) {
                    Toast.makeText(ctx, "not fet any json", Toast.LENGTH_LONG).show();
                }
            }
            //super.onPostExecute(s)
            else {
                Toast.makeText(ctx, "error parsing json data", Toast.LENGTH_LONG).show();
            }
        }
    }
