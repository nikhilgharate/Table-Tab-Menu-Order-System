package com.example.tabletop;

import android.content.Intent;
import android.os.Bundle;

import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.google.android.material.snackbar.Snackbar;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;

import android.view.View;

import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ViewFlipper;

public class MainActivity extends AppCompatActivity {
    ViewFlipper flipper;
    EditText e1, e2, e3;
    Button b1,b2;
TextView v1;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        int imgarray[] = {R.drawable.bestfood, R.drawable.slide1, R.drawable.slide2, R.drawable.slide3, R.drawable.slide4};
        flipper = (ViewFlipper) findViewById(R.id.flipper);
        for(int i=0;i<imgarray.length;i++)
            showimage(imgarray[i]);
    }
    public void showimage(int img)
    {
        ImageView imageview=new ImageView(this);
        imageview.setBackgroundResource(img);
        flipper.addView(imageview);
        flipper.setFlipInterval(3000);
        flipper.setAutoStart(true);

        flipper.setInAnimation(this, android.R.anim.slide_in_left);
        flipper.setInAnimation(this, android.R.anim.slide_out_right);
        e1 = (EditText) findViewById(R.id.edrnumber);
        e2 = (EditText) findViewById(R.id.edupass);
        e3 = (EditText) findViewById(R.id.edmobile);
        b1 = (Button) findViewById(R.id.butlog);
                v1 =(TextView) findViewById(R.id.eduname);

    }

    public void onClickButlog(View v) {
        String s1, s2, s3;
        s1 = e1.getText().toString();
        s2 = e2.getText().toString();
        s3 = e3.getText().toString();
        if (s1.trim().equals("")) {
            Toast.makeText(this, "Plz Enter Table number", Toast.LENGTH_SHORT).show();
            e1.requestFocus();
            return;
        }
        if (s2.trim().equals("")) {
            Toast.makeText(this, "Plz Enter User Passward", Toast.LENGTH_SHORT).show();
            e2.requestFocus();
            return;
        }
        if (s3.trim().equals("") || s3.length()>11  || s3.length()<10)
        {
            Toast.makeText(this, "Plz Enter Valid  mobile no", Toast.LENGTH_SHORT).show();
            e3.requestFocus();
            return;
        }

        new LCheckActivity(this).execute(s1,s2,s3);
    }




        @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}