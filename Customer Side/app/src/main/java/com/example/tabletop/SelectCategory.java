package com.example.tabletop;

import android.content.Intent;
import android.os.Bundle;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class SelectCategory extends AppCompatActivity {
    String HI = "";
    ArrayList<Product_List> product;
    ListView lv;
    private JsonArrayRequest request;
    private RequestQueue requestQueue;
    private CustomListAdapter adapter;
    String []namedata;
    String un,tn,dt;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_select_category);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        Intent i=getIntent();
        Bundle b=i.getExtras();
        un=b.getString("uname");
        dt=b.getString("dtype");
        tn=b.getString("tno");

        lv=(ListView)findViewById(R.id.listview);
        HI="https://studentproject.co.in/api/menulist.php?mtype="+dt;
        product=new ArrayList<>();
        getData();


        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                // String selectedItem = (String) parent.getItemAtPosition(position);
                //String s1= selectedItem;
                Toast.makeText(SelectCategory.this,"select is "+namedata[position],Toast.LENGTH_LONG).show();
                Intent nxt=new Intent(SelectCategory.this,MemuDetail.class);
                 nxt.putExtra("mname",namedata[position].toString());
                nxt.putExtra("uname",un);
                nxt.putExtra("tno",tn);
                // nxt.putExtra("vno",s1);
                 startActivity(nxt);



            }
        });




    }

    private void getData() {
        request=new JsonArrayRequest(HI, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                JSONObject jsonObject=null;
                namedata=new String[response.length()];
                for (int i=0; i<response.length(); i++){
                    try {
                        jsonObject=response.getJSONObject(i);
                        Product_List productList=new Product_List(jsonObject.getString("mname"),
                                jsonObject.getString("mprice"),
                                jsonObject.getString("mimage"));
                        namedata[i]=jsonObject.getString("mname");
                        product.add(productList);
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }

                }
                setupData(product);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        });
        requestQueue= Volley.newRequestQueue(this);
        requestQueue.add(request);

    }

    private void setupData(ArrayList<Product_List> product) {
        adapter=new CustomListAdapter(getApplicationContext(),R.layout.custom_list,product);
        lv.setAdapter(adapter);
    }
}

