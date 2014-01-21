package sensor_app_package;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class Database {
	// reference to database connection
	  private static Connection connection;
	  private static PreparedStatement sql_get_S2_data;
	   
	public static void main(String[] args)
	{
		try {
			connect();
			
			 // locate person
			sql_get_S2_data = connection.prepareStatement(
		         "SELECT * "+
		         "FROM sensor2 " +
		         "WHERE entryID < ?");
			
			sql_get_S2_data.setInt(1 , 10);
			
			 System.out.println(sql_get_S2_data.toString());
	         ResultSet resultSet = sql_get_S2_data.executeQuery();
	         
	         if ( !resultSet.next() ){
	        	 System.out.println("No result set returned");
	         }
	         else{
	        	 resultSet.beforeFirst();
	        	 while(resultSet.next())
	        	 {
	        		 System.out.println(""+ resultSet.getFloat("temp2"));
	        	 }
	        	 
	        	 
	        	 
	         }
		      
			closeConnections();
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	
	private static void closeConnections() {
		// TODO Auto-generated method stub
		try {
			connection.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
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
}