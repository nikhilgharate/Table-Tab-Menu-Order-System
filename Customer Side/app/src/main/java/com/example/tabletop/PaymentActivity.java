package com.example.tabletop;

import android.animation.TimeAnimator;
import android.app.Activity;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

import android.os.StrictMode;
import android.view.Gravity;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.PopupMenu;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;

public class PaymentActivity extends AppCompatActivity    {


    ListView simpleList;
    //String countryList[] = {"India", "China", "australia", "Portugle", "America", "NewZealand"};
    InputStream is = null;
    String line = "";
    String result = null;
    private String json;
    String[] namedata;
int tot=0;
    TextView v1,v2,v3;


    String un,tn;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_payment);
        Toolbar toolbar = findViewById(R.id.toolbar);

        try {

            Intent i=getIntent();
            Bundle b=i.getExtras();
            un=b.getString("uname");
            tn=b.getString("tno");
            //Toast.makeText(this,"user name is coming  "+un+" table no "+tn,Toast.LENGTH_LONG).show();
            simpleList = (ListView)findViewById(R.id.simpleListView);
            v1 = (TextView) findViewById(R.id.tvamt);
            v2 = (TextView) findViewById(R.id.tvgst);
            v3 = (TextView) findViewById(R.id.tvnet);

            StrictMode.setThreadPolicy((new StrictMode.ThreadPolicy.Builder().permitNetwork().build()));
            getdata(un);
            //  Toast.makeText(this,"store   " +namedata.length,Toast.LENGTH_LONG ).show();
            v1.setText("Total Amount is :- " + tot);
            int gst = tot * 10 / 100;
            v2.setText(v2.getText() + " " + gst);
            int net = tot + gst;
            v3.setText(v3.getText() + " " + net);
            ArrayAdapter<String> arrayAdapter = new ArrayAdapter<String>(this, R.layout.activity_listview, R.id.textView, namedata);
            simpleList.setAdapter(arrayAdapter);

            simpleList.setOnItemClickListener(new AdapterView.OnItemClickListener() {
                @Override
                public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                    String selectedItem = (String) parent.getItemAtPosition(position);
                    String s1= selectedItem;
                    // Toast.makeText(ViewEsitmateList.this,"select is"+s1,Toast.LENGTH_LONG).show();
                  //  Intent nxt=new Intent(CompRepList.this,CompRepDetail.class);
                    //nxt.putExtra("uname",un);
                    //nxt.putExtra("vno",s1);
                    //startActivity(nxt);



                }
            });




        }
        catch(Exception e)
        {

            //Toast.makeText(this,"main  " +e.getMessage().toString(),Toast.LENGTH_LONG ).show();
        }

    }




    private void getdata(String x) {
        try {

//https://khandeshiit.com/tabletop/geto.php?mobno=9370152526

            String s="?mobno="+x;
            String link = "https://studentproject.co.in/api/geto.php"+s;
            URL url = new URL(link);
            HttpURLConnection con = (HttpURLConnection) url.openConnection();
            con.setRequestMethod("GET");
            is = new BufferedInputStream(con.getInputStream());
        } catch (Exception e) {
        }
        try {
            BufferedReader br = new BufferedReader(new InputStreamReader(is));
            StringBuilder sb = new StringBuilder();
            while ((line=br.readLine()) != null)
            {
                sb.append(line + "\n");

            }
            is.close();
            result = sb.toString();

        } catch (Exception e) {
        }

        try {



            /*JSONArray jArray = new JSONArray(result);
            JSONObject json_data = new JSONObject();
            for(int i=0;i<jArray.length();i++) {
                json_data = jArray.getJSONObject(i);
                namedata[i] = json_data.getString("vno");
                //usrname = json_data.getString("uname");

            }*/


            if(result.startsWith("null")){
                result = result.substring("null".length(), result.length());
            }
            //JSONObject json = new JSONObject(result);


            JSONArray ja = new JSONArray(result);
            JSONObject jo = new JSONObject();
            namedata = new String[ja.length()];
            //Toast.makeText(this,"ja   " +namedata.length,Toast.LENGTH_LONG ).show();
            for (int i = 0; i < ja.length(); i++) {
                jo = ja.getJSONObject(i);
                namedata[i] = jo.getString("mname")+"                  "+jo.getString("qty")+"      "+jo.getString("rate");
               tot=tot+Integer.parseInt(jo.getString("amount"));

                //Toast.makeText(this,"store "+i+"  " +namedata[i].toString(),Toast.LENGTH_LONG ).show();
            }
        } catch (Exception e) {

            Toast.makeText(this,"in json  " +e.getMessage().toString(),Toast.LENGTH_LONG ).show();
        }

    }

    public void confClick(View v)
    {

        Intent suc=new Intent(PaymentActivity.this,SuccessActivity.class);
        suc.putExtra("total",""+tot);
        suc.putExtra("uname",un);
        suc.putExtra("tno",tn);

        //suc.putExtra("tbn",tbn);
        //Toast.makeText(this,"pass table no "+tbn,Toast.LENGTH_LONG).show();
        //Toast.makeText(this,"pass total  "+v1.getText().toString(),Toast.LENGTH_LONG).show();
        startActivity(suc);


    }


}










