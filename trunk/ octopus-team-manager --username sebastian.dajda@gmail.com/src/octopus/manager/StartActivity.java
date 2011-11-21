package octopus.manager;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;

public class StartActivity extends Activity {
    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.start);
        
        Thread timer = new Thread()
        {
        	public void run()
        	{
        		try
        		{
        			sleep(10000);
        		}
        		catch(InterruptedException e)
        		{
        			e.printStackTrace();
        		}
        		finally
        		{
        			Intent octopusManager= new Intent("android.intent.action.OCTOPUSMANAGER"/*StartActivity.this, OctopusManagerActivity.class*/);
        			startActivity(octopusManager);
        		}
        	}
        };
        timer.start();
   
    }
}