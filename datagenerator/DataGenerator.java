import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.io.UnsupportedEncodingException;
import java.util.ArrayList;
import java.util.Random;


public class DataGenerator {
	
	static ArrayList<String> eesnimed = new ArrayList<String>();
	static ArrayList<String> perenimed = new ArrayList<String>();
	static ArrayList<Integer> piirkonnad = new ArrayList<Integer>();
	static ArrayList<String> firstnameList = new ArrayList<String>();
	static ArrayList<String> lastnameList = new ArrayList<String>();
	static ArrayList<Integer> voters = new ArrayList<Integer>();
	static int numberOfUsers = 100;
	static int numberOfCandidates = 50;
	static int numberOfVotes = 40;
	
	public static void main(String[] args) {
		
		try {
			fillNameLists();
		} catch (IOException e) {
		}
		
		generateUsers();
		generateCandidates();
		generateVotes();
		
	}
	
	
	public static void generateUsers() {
		
		Random random = new Random();
		PrintWriter writer;
		String firstname;
		String lastname;
		int area = 1;
		try {
			writer = new PrintWriter("users.txt", "UTF-8");
			writer.println("INSERT INTO `morsakabi`.`user` (`id`, `areaid`, `lastname`, `firstname`, `email`) VALUES ");
			for(int i = 0; i < numberOfUsers; i++) {
				firstname = randomFirstName();
				eesnimed.add(firstname);
				lastname = randomLastName();
				perenimed.add(lastname);
				area = (random.nextInt(12) + 1);
				piirkonnad.add(area);
				if(i == numberOfUsers-1) {
					writer.println("(NULL, '" + area + "', '" + lastname + "', '" + firstname + "', '" + firstname + "." + lastname + "@gmail.com');");
				} else {
					writer.println("(NULL, '" + area + "', '" + lastname + "', '" + firstname + "', '" + firstname + "." + lastname + "@gmail.com'), ");
				}				
			}
			writer.close();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (UnsupportedEncodingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}						
	}
	
	public static void generateCandidates() {
		//INSERT INTO `morsakabi`.`candidate` (`id`, `userid`, `areaid`, `partyid`, `educationid`, `birthdate`, `job`, `description`) VALUES (NULL, '1', '2', '5', '1', '1994-05-14', 'Androidi arendaja', 'Do you even lift?');
		Random random = new Random();
		PrintWriter writer;
		try {
			writer = new PrintWriter("candidates.txt", "UTF-8");
			writer.println("INSERT INTO `morsakabi`.`candidate` (`id`, `userid`, `areaid`, `partyid`, `educationid`, `birthdate`, `job`, `description`) VALUES ");
			for(int i = 0; i<numberOfCandidates; i++) {
				if(i == numberOfCandidates-1) {
					writer.println("(NULL, '" + (i + 1) + "', '" + piirkonnad.get(i) + "', '" + (random.nextInt(11) + 1) + "', '" + (random.nextInt(5)) + "', '19" + (random.nextInt(49) + 50) + "-0" +(random.nextInt(9) + 1) +"-"+ (random.nextInt(20) + 10) +"', 'Amet', 'Kirjeldus');");
				} else {
					writer.println("(NULL, '" + (i + 1) + "', '" + piirkonnad.get(i) + "', '" + (random.nextInt(11) + 1) + "', '" + (random.nextInt(5)) + "', '19" + (random.nextInt(49) + 50) + "-0" +(random.nextInt(9) + 1) +"-"+ (random.nextInt(20) + 10) +"', 'Amet', 'Kirjeldus'), ");
				}	
			}
			writer.close();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} catch (UnsupportedEncodingException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}						
	}
	
	public static void generateVotes() {
		//INSERT INTO `morsakabi`.`vote` (`voterid`, `candidateid`, `date`) VALUES ('1', '1', '2015-02-19 12:15:00');
			
			Random random = new Random();
			PrintWriter writer;
			int minVoterID = 12;
			int maxVoterID = numberOfUsers;
			int minCandidateID = 12;
			int maxCandidateID = numberOfCandidates;
			
			try {
				writer = new PrintWriter("votes.txt", "UTF-8");
				writer.println("INSERT INTO `morsakabi`.`vote` (`voterid`, `candidateid`, `date`) VALUES ");
				for(int i = 0; i<numberOfVotes; i++) {

					if(i == numberOfVotes-1) {
						writer.println("('"+ randomVoterID(minVoterID, maxVoterID) + "', '" + randomCandidateID(1, maxCandidateID) +
								"', '2015-02-" + (random.nextInt(10) + 15)+ " " + (random.nextInt(10) + 12) + ":" + (random.nextInt(60) + 1) + ":00');");
					} else {
						writer.println("('"+ randomVoterID(minVoterID, maxVoterID) + "', '" + randomCandidateID(1, maxCandidateID) +
								"', '2015-02-" + (random.nextInt(10) + 15)+ " " + (random.nextInt(10) + 12) + ":" + (random.nextInt(60) + 1) + ":00'), ");
					}				
				}
				writer.close();
			} catch (FileNotFoundException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} catch (UnsupportedEncodingException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}						
		}
	
	public static int randomCandidateID(int min, int max) {
		
		Random random = new Random();
		
		int candidateID = random.nextInt(max - min) + min;
		if(random.nextInt(10) + 1 < 8 && max > 10) {
			while(candidateID % 11 != 0) {			
				candidateID = random.nextInt(max - min) + min;
				}			
		}	
		
		return candidateID;
	}
	
	public static int randomVoterID(int min, int max) {
		
		Random random = new Random();
		
		int voterID = 1;
		while(voters.contains(voterID)) {			
			voterID = random.nextInt(max - min) + min;
			}
		voters.add(voterID);
		return voterID;
	}
	
	
	public static String randomFirstName() {
		
		Random rand = new Random();
		
		return firstnameList.get(rand.nextInt(firstnameList.size()));
	}
	
	public static String randomLastName() {
		
		Random rand = new Random();
		
		return lastnameList.get(rand.nextInt(lastnameList.size()));
	}
	
	public static void fillNameLists() throws IOException {
		
		//FirstnameList
		BufferedReader br = new BufferedReader(new FileReader("nimed.txt"));
	    try {	       
	        String line = br.readLine();

	        while (line != null) {
	            firstnameList.add(line.trim());
	            line = br.readLine();
	        }
	        
	    } catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
	        br.close();
	    }
	    
	    //LastnameList
	    br = new BufferedReader(new FileReader("perenimed.txt"));
	    try {	       
	        String line = br.readLine();

	        while (line != null) {
	            lastnameList.add(line.trim());
	            line = br.readLine();
	        }
	        
	    } catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
	        br.close();
	    }
	    
	    
	}

}
