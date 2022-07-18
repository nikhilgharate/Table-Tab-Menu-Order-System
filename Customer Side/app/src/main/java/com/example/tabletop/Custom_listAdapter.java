package com.example.tabletop;

import android.app.Activity;
import android.content.Context;
import android.provider.ContactsContract;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;


import com.squareup.picasso.Picasso;

import java.util.ArrayList;
import java.util.List;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

class CustomListAdapter extends ArrayAdapter<Product_List> {
    ArrayList<Product_List>productList;
    Context context;
    int resource;
    public CustomListAdapter(@NonNull Context context, int resource, @NonNull ArrayList<Product_List> productList) {
        super(context, resource, productList);
        this.productList=productList;
        this.context=context;
        this.resource=resource;

    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        if (convertView==null){
            LayoutInflater layoutInflater=(LayoutInflater)getContext().getSystemService(Activity.LAYOUT_INFLATER_SERVICE);
            convertView=layoutInflater.inflate(R.layout.custom_list,null,true);
        }
        Product_List pr=getItem(position);
        ImageView primg=(ImageView)convertView.findViewById(R.id.prImg);
        TextView prname=(TextView)convertView.findViewById(R.id.txtName);
        TextView prprice=(TextView)convertView.findViewById(R.id.txtPrice);

        Picasso.with(context)
                .load(pr.getPrImg())
                .into(primg);

        prname.setText("Menu Name\n"+pr.getPrName());

        prprice.setText("Menu Rate\n"+pr.getPrPrice()+" Rs.");

        return convertView;
    }
}