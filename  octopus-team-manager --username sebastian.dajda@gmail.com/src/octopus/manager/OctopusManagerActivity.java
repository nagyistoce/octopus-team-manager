package octopus.manager;

import android.app.Activity;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;

public class OctopusManagerActivity extends Activity {
	
	
	private Button button;
	private Button button2;
	
	private OnClickListener listener = new OnClickListener()
	{
		public void onClick(View v)
		{
			
			 setContentView(R.layout.register);		
		}
	};
	
	private OnClickListener listener2 = new OnClickListener()
	{
		public void onClick(View v)
		{
			
			 setContentView(R.layout.signin);		
		}
	};
	
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.main);
        
        button = (Button)findViewById(R.id.rejestracja);
        button.setOnClickListener(listener);    
      
        button2 = (Button)findViewById(R.id.login);
        button2.setOnClickListener(listener2);
    }
}