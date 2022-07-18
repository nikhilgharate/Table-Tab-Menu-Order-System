package com.example.tabletop;

import android.content.Intent;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;
import android.widget.Toast;

public class Afterlogin extends AppCompatActivity {
String un,tn;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_afterlogin);
        //Toolbar toolbar = findViewById(R.id.toolbar);
        //setSupportActionBar(toolbar);
        Intent i=getIntent();
        Bundle b=i.getExtras();
        un=b.getString("uname");
        tn=b.getString("tno");


    }



            public void breakfastbtn(View view) {
                Intent nxt = new Intent(this, SelectCategory.class);
                nxt.putExtra("uname",un);
                nxt.putExtra("dtype","Breakfast");
                nxt.putExtra("tno",tn);
                startActivity(nxt);
            }

            public void lunchbtn(View view) {
                Intent nxt = new Intent(this, SelectCategory.class);
                nxt.putExtra("uname",un);
                nxt.putExtra("dtype","Lunch");
                nxt.putExtra("tno",tn);
                startActivity(nxt);
            }

            public void dinnerbtn(View view) {
                Intent nxt = new Intent(this, SelectCategory.class);
                nxt.putExtra("uname",un);
                nxt.putExtra("dtype","Dinner");
                nxt.putExtra("tno",tn);
                startActivity(nxt);
            }

            public void dessertbtn(View view) {
                Intent nxt = new Intent(this, SelectCategory.class);
                nxt.putExtra("uname",un);
                nxt.putExtra("dtype","Dessert");
                nxt.putExtra("tno",tn);
                startActivity(nxt);
            }


            public void logoutbtn(View view) {
               Intent back=new Intent(this ,MainActivity.class);
               startActivity(back);
               finish();
            }
}
