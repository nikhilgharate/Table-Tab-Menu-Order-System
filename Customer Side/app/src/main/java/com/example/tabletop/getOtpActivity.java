package com.example.tabletop;

import android.content.Intent;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.Toast;

public class getOtpActivity extends AppCompatActivity {
    EditText e1;
    CheckBox chap;
    Button b1;
    String un,s1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_get_otp);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        e1 = (EditText) findViewById(R.id.txtotp);
        chap = (CheckBox) findViewById(R.id.chatc);
        b1 = (Button) findViewById(R.id.butstop);
        Intent i = getIntent();
        Bundle b = i.getExtras();
        un = b.getString("uname");
       // Toast.makeText(this ,"un aala "+un,Toast.LENGTH_LONG).show();
    }
    public void submitotp(View v)
    {
        s1=e1.getText().toString();
        if (s1.trim().equals("")) {
            Toast.makeText(this, "Plz Enter OTP", Toast.LENGTH_SHORT).show();
            e1.requestFocus();
            return;
        }
        if (chap.isChecked() == false)
         {

            Toast.makeText(this, "Plz Select Apply Term & Condition", Toast.LENGTH_LONG).show();

            return;
         }

        new ConfirmOTP(this).execute(un,s1);

    }
}