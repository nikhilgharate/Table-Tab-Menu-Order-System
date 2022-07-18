
package com.example.tabletop;

import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.provider.Telephony;
import android.telephony.SmsManager;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.TextView;
import android.widget.Toast;

public class SuccessActivity extends AppCompatActivity {
    TextView tvtot;
    Button b1, b2;
    EditText e1, e2, e3, e4,e5;
    RadioButton rb1, rb2;
    String un,tn,s1;
    private static final int PERMISSION_REQUEST_CODE = 1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_success);
        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        // tvtot=(TextView)findViewById(R.id.tvtot);
        Intent i = getIntent();
        Bundle b = i.getExtras();
         s1 = b.getString("total");
        un=b.getString("uname");
        tn=b.getString("tno");
        //Toast.makeText(this ,"Alla "+s1+" un "+un+"tab "+tn,Toast.LENGTH_LONG).show();

        // tvtot.setText(s1);
        e1 = (EditText) findViewById(R.id.txtcc);
        e2 = (EditText) findViewById(R.id.txtmm);
        e3 = (EditText) findViewById(R.id.txtyy);
        e4 = (EditText) findViewById(R.id.txtcvv);
        e5 = (EditText) findViewById(R.id.txtam);
        rb1 = (RadioButton) findViewById(R.id.rbdc);
        rb2 = (RadioButton) findViewById(R.id.rbcc);
        b1=(Button)findViewById(R.id.butscan);
        b2=(Button)findViewById(R.id.butscan);
        e5.setText(s1);


    }

    public void getotp(View v) {
        if (e1.getText().toString().trim().equals("")|| e1.getText().length()<16 || e1.getText().length()>16) {
            Toast.makeText(this, "Plz Enter valid Card No", Toast.LENGTH_LONG).show();
            e1.requestFocus();
            return;
        }
        if (e2.getText().toString().trim().equals("")|| Integer.parseInt(e2.getText().toString())>12) {
            Toast.makeText(this, "Plz Enter Valid Month", Toast.LENGTH_LONG).show();
            e2.requestFocus();
            return;
        }

        if (e3.getText().toString().trim().equals("")|| Integer.parseInt(e3.getText().toString())<21) {
            Toast.makeText(this, "Plz Enter Card Valid Year ", Toast.LENGTH_LONG).show();
            e3.requestFocus();
            return;
        }
        if (e4.getText().toString().trim().equals("")||e4.getText().length()>3|| e4.getText().length()<3  ) {
            Toast.makeText(this, "Plz Enter Valid Cvv No", Toast.LENGTH_LONG).show();
            e4.requestFocus();
            return;
        }
        String cmode = "";
        if (rb1.isChecked() == true) {
            cmode = "DEBIT CARD";
        } else {
            cmode = "CREDIT CARD";
        }
        AlertDialog.Builder builder;
        AlertDialog alert;
        builder = new AlertDialog.Builder(SuccessActivity.this);
       // builder = new AlertDialog.Builder(SuccessActivity.this, R.style.MyDialogTheme);
        builder.setTitle("Confirm");
        builder.setMessage("Are You Sure Transfer Payment?");
        builder.setCancelable(false);
        builder.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
            ProgressDialog loading;

            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                try {

                    Intent geto = new Intent(SuccessActivity.this, getOtpActivity.class);
                    Toast.makeText(getApplicationContext(), "OTP Is Send Ur Mobile No", Toast.LENGTH_LONG).show();
                     new submitFinal(SuccessActivity.this).execute(tn,un,s1,e1.getText().toString());

                } catch (Exception e) {
                    Toast.makeText(getApplicationContext(), "test error" + e.getMessage(), Toast.LENGTH_LONG).show();
                }
            }
        });
        builder.setNegativeButton("No ", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {

                //Intent geto = new Intent(SuccessActivity.this, getOtpActivity.class);
                //SmsManager m=SmsManager.getDefault();
                // m.sendTextMessage("9370152526","bhoot","1234",null,null);
                //Toast.makeText(getApplicationContext(), "OTP Is Send Ur Mobile No", Toast.LENGTH_LONG).show();
                //geto.putExtra("mobno", un);
                //geto.putExtra("otp", "1234");
                //startActivity(geto);


            }
        });
        alert = builder.create();
        alert.show();


    }
}