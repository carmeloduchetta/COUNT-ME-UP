package net.bbc.counting.test;

import java.util.logging.Level;
import java.util.logging.Logger;

import net.bbc.counting.settings.SolrQueryServices;
import net.bbc.counting.settings.SourceSettings;

public class Test1 {

	/**
	 *
	 *	Given an integer M and a zero-indexed array A consisting of N non-negative integers, which are not greater than M, 
	 *  returns the value (or one of the values) that occurs most often in this array
	 *	Unfortunately,despite the fact that the function may return the expected result for the example input, 
	 *	there is a bug (or bugs) in the implementation, which may produce incorrect results for other inputs.
	 *	Find the bug(s) and correct them. 
	 * 
	 */
	
	
	//public int solution(int M, int[] A);
	private static final Logger logger = Logger.getLogger(Test1.class.getName());
	
	int solution(int M, int[] A) {
		
		logger.log(Level.INFO, "DBAccess.addAmenity");
        
		int N = A.length; //number of elements
        
        int[] count = new int[M + 1]; //
        
        for (int i = 0; i <= M; i++)
            count[i] = 0;
        
        int maxOccurence = 1;
        int index = -1;
        
        for (int i = 0; i < N; i++) {
            if (count[A[i]] > 0) {
                int tmp = count[A[i]];
                if (tmp > maxOccurence) {
                    maxOccurence = tmp;
                    index = i;
                }
                count[A[i]] = tmp + 1;
            } else {
                count[A[i]] = 1;
            }
        }
        
        return A[index];
    }
	
	public static void main(String[] args) {
		Test1 test = new Test1();
		SourceSettings.loadConfigProperties();
		 
		SolrQueryServices.countUserVotes("658bfdc0-f557-11e3-b164-000c29151863");
		// N is an Integer within the range [1 - 200,000]
		// M is an Integer within the range [1 - 10,000]
		// each element of Array A is an Integer within the range [0...M]
		//List<Integer> arrayOfRange  = new ArrayList<Integer>();
	    //int[] range = IntStream.iterate(1, n -> {arrayOfRange.add(n);return n + 1;}).limit(10).toArray();
		
		
		//test.solution(M, A)
    }
}

