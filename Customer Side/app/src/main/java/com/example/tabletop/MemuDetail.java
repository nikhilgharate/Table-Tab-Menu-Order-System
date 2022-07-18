package com.example.tabletop;

import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.os.StrictMode;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.net.URLEncoder;

public class MemuDetail extends AppCompatActivity {


    Button b1,b2,b3,b4;
    EditText e1;
    TextView v1,v2,v3,v4;
    int q,r,a;
    String adc="";


    InputStream is = null;
    String line = "";
    String result = null;
    String[] data;
    String iurl = "";
    String mdscr ,rate;
    ImageView img;
    Bitmap bitmap;
    ProgressDialog pDialog;
    String un,tn;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_memu_detail);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        Intent i=getIntent();
        Bundle b=i.getExtras();
        String   s2=b.getString("mname");
        un=b.getString("uname");
        tn=b.getString("tno");

        v1=(TextView)findViewById(R.id.tv1);
        v2=(TextView)findViewById(R.id.tvdesc);
        v3=(TextView)findViewById(R.id.tvprice);
        v4=(TextView)findViewById(R.id.tvamt);

        img = (ImageView) findViewById(R.id.image1);


        e1=(EditText)findViewById(R.id.txtqty);
        b1=(Button)findViewById(R.id.butninus);
        b2=(Button)findViewById(R.id.butplus);
        b3=(Button)findViewById(R.id.Addc);
        b4=(Button)findViewById(R.id.payment);

        StrictMode.setThreadPolicy((new StrictMode.ThreadPolicy.Builder().permitNetwork().build()));

        getdata(s2);
        // Toast.makeText(this ,"facility "+ facil,Toast.LENGTH_LONG).show();

        v1.setText(s2);
        v2.setText(mdscr);
        v3.setText(rate);

        q=Integer.parseInt(e1.getText().toString());
        r=Integer.parseInt(v3.getText().toString());
        a=q*r;
        v4.setText(""+a);


        GetXMLTask task = new GetXMLTask();
        // Execute the task
        task.execute(new String[] { iurl });





    }



    private void getdata(String x) {
        try {
//https://khandeshiit.com/tabletop/getmdetail.php?mname=Idli
            String ht = "?mname=" + URLEncoder.encode(x, "UTF-8").toString();
            String link = "https://studentproject.co.in/api/getmdetail.php" + ht;

            URL url = new URL(link);
            HttpURLConnection con = (HttpURLConnection) url.openConnection();
            con.setRequestMethod("GET");
            is = new BufferedInputStream(con.getInputStream());
        } catch (Exception e) {
        }
        try {
            BufferedReader br = new BufferedReader(new InputStreamReader(is));
            StringBuilder sb = new StringBuilder();
            while ((line = br.readLine()) != null) {
                sb.append(line + "\n");

            }
            is.close();
            result = sb.toString();

        } catch (Exception e) {
        }

        try {
            if (result != null) {
                JSONArray ja = new JSONArray(result);
                JSONObject jo = null;
                data = new String[ja.length()];
                for (int i = 0; i < ja.length(); i++) {
                    jo = ja.getJSONObject(i);
                    iurl = jo.getString("mimage");
                    mdscr = jo.getString("mdesc");
                    rate = jo.getString("mprice");

                }
            } else {
                Toast.makeText(this, "No Data Found", Toast.LENGTH_LONG).show();

            }
        } catch (Exception e) {
        }

    }

    private class GetXMLTask extends AsyncTask<String, Void, Bitmap> {
        @Override
        protected Bitmap doInBackground(String... urls) {
            Bitmap map = null;
            for (String url : urls) {
                map = downloadImage(url);
            }
            return map;
        }

        // Sets the Bitmap returned by doInBackground
        @Override
        protected void onPostExecute(Bitmap result) {
            img.setImageBitmap(result);
        }

        // Creates Bitmap from InputStream and returns it
        private Bitmap downloadImage(String url) {
            Bitmap bitmap = null;
            InputStream stream = null;
            BitmapFactory.Options bmOptions = new BitmapFactory.Options();
            bmOptions.inSampleSize = 1;

            try {
                stream = getHttpConnection(url);
                bitmap = BitmapFactory.
                        decodeStream(stream, null, bmOptions);
                stream.close();
            } catch (IOException e1) {
                e1.printStackTrace();
            }
            return bitmap;
        }

        // Makes HttpURLConnection and returns InputStream
        private InputStream getHttpConnection(String urlString)
                throws IOException {
            InputStream stream = null;
            URL url = new URL(urlString);
            URLConnection connection = url.openConnection();

            try {
                HttpURLConnection httpConnection = (HttpURLConnection) connection;
                httpConnection.setRequestMethod("GET");
                httpConnection.connect();

                if (httpConnection.getResponseCode() == HttpURLConnection.HTTP_OK) {
                    stream = httpConnection.getInputStream();
                }
            } catch (Exception ex) {
                ex.printStackTrace();
            }
            return stream;
        }
    }



    public void minusClick(View v)
    {
        q=Integer.parseInt(e1.getText().toString());
        q--;
        e1.setText(""+q);
        r=Integer.parseInt(v3.getText().toString());
        a=q*r;
        v4.setText(""+a);
    }


    public void plusClick(View v)
    {
        q=Integer.parseInt(e1.getText().toString());
        q++;

        e1.setText(""+q);

        r=Integer.parseInt(v3.getText().toString());
        a=q*r;
        v4.setText(""+a);
    }


    public void adcClick(View v) {

        if(Integer.parseInt(e1.getText().toString())<=0)
        {
            Toast.makeText(this,"Plz Enter Valid Quantity ",Toast.LENGTH_LONG).show();
            e1.requestFocus();
            return;
        }

        adc="Item Name "+v1.getText().toString()+" Rate "+v3.getText().toString()+" Quantity is "+e1.getText().toString()+" Total is "+v4.getText().toString();
        Toast.makeText(this,"Ur Item Added "+adc,Toast.LENGTH_LONG).show();
        //String mbno="9370152526";// he change karayach aahe
        new SubmitOreder(this).execute(un,v1.getText().toString(),e1.getText().toString(),v3.getText().toString(),v4.getText().toString());

    }



    public void payClick(View v) {

       Intent pay=new Intent(this,PaymentActivity.class);
        pay.putExtra("uname",un);
        pay.putExtra("tno",tn);
       startActivity(pay);



    }



}
