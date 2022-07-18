package com.example.tabletop;

import android.content.Intent;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class DelConfirm extends AppCompatActivity {
TextView v1;
String mobno;
Button b1;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_del_confirm);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        v1=(TextView)findViewById(R.id.mname);
        b1=(Button)findViewById(R.id.butdel);
        Intent i=getIntent();
        Bundle b=i.getExtras();
        v1.setText(b.getString("mname"));
        mobno=b.getString("mb");
        Toast.makeText(this," "+mobno,Toast.LENGTH_LONG).show();

    }

    public void onDelClick(View v)
    {
        new delOrder(this).execute(v1.getText().toString(),mobno);

    }

}