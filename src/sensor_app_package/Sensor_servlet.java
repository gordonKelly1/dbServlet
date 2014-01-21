package sensor_app_package;

import java.io.IOException;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.json.JSONObject;

@WebServlet("/sensorData")
public class Sensor_servlet extends HttpServlet {
	
	 private static Connection connection;
	 private static PreparedStatement sql_get_S3_last_data;
	 private static PreparedStatement sql_get_last_data;
	@Override
	public void init() throws ServletException {
		// TODO Auto-generated method stub
		//super.init();
		
	}
	@Override
	protected void doGet(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		 Map<String, Object> map=new HashMap<String, Object>();
		System.out.println("in doget");
		try {
				connect(); //connect to db
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	      resp.setContentType( "application/json");
	      ResultSet sensor_data = getLastData(2);
	     
	      try {
	    	  	sensor_data.beforeFirst();
	    	  	if(sensor_data.next())
	    	  	{
	    	  		float temperature = sensor_data.getFloat("temp2");
	    	  		float humidity = sensor_data.getFloat("humidity");
	    	  		int als = sensor_data.getInt("als");
	    	  		int light_on = sensor_data.getInt("light_on");
	    	  		int heating_on = sensor_data.getInt("heating_on");
	    	  		
	    	  		map.put("s2_temp", temperature);
	    	  		map.put("s2_humidity", humidity);
	 		     	map.put("s2_als", als);
	 		     	map.put("s2_lighting_on", light_on);
	 		     	map.put("s2_heating_on", heating_on);
	 		     	
	 		     	sensor_data = getLastData(3);
	 		     	sensor_data.beforeFirst();
	 		     	sensor_data.next();
	 		    
	 		        temperature = sensor_data.getFloat("temp2");
	    	  		humidity = sensor_data.getFloat("humidity");
	    	  		als = sensor_data.getInt("als");
	    	  		light_on = sensor_data.getInt("light_on");
	    	  		heating_on = sensor_data.getInt("heating_on");
	    	  		
	    	  		map.put("s3_temp", temperature);
	    	  		map.put("s3_humidity", humidity);
	 		     	map.put("s3_als", als);
	 		     	map.put("s3_lighting_on", light_on);
	 		     	map.put("s3_heating_on", heating_on);
	 		     	
	    	  }
			
		   
		     
		     JSONObject jsonObj = new JSONObject(map);
		     System.out.println(jsonObj.toString());
		     
		      // send XHTML document to client
		      String operation = req.getParameter("operation");
		    
		      OutputStream out = resp.getOutputStream();
		      OutputStreamWriter os = new OutputStreamWriter(out);
		      os.write(jsonObj.toString());
		      os.flush();
		      os.close();
		    	 
		      
		  	try {
				connection.close();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		     
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
	     
	  
	      
	      
	
	}
	
	
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp)
			throws ServletException, IOException {
		// TODO Auto-generated method stub
		super.doPost(req, resp);
		doGet(req, resp);
	}
	@Override
	public void destroy() {
		// TODO Auto-generated method stub
		//super.destroy();
	
	}
	
	public static void connect() throws Exception
	{
	
	 

			String database = "db1";
		    String driver = "com.mysql.jdbc.Driver";
		    String user = "root";
		    String url = "jdbc:mysql://localhost:3306/" + database;
		    
		    
		    try {
				Class.forName(driver);
				connection = DriverManager.getConnection(url, user, "miltown1");
				connection.setAutoCommit(false);
			} catch (Exception e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		    
	}
	private ResultSet getLastData(int sensor) {
		// TODO Auto-generated method stub
		float temp = 0;
		ResultSet resultSet = null;
		
		 // locate person
		try {
				
				sql_get_last_data = connection.prepareStatement("select * from sensor"+sensor+" order by entryID desc limit 1" );
			
			
			
	         resultSet = sql_get_last_data.executeQuery();
	         
	         if ( !resultSet.next() ){
	        	 System.out.println("No result set returned");
	         }
	         else{
	        	 resultSet.beforeFirst();
	        	 while(resultSet.next())
	        	 {
	        		temp = resultSet.getFloat("temp2");
	        		System.out.println(temp);
	        	 }
	        	 
	        	 
	        	 
	         }
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
	      
			
		return resultSet;
	}
	

}
