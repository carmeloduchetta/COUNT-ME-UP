package net.bbc.counting.test;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Comparator;
import java.util.HashSet;
import java.util.List;
import java.util.Random;

public class Test2 {
	
	int cost_dayticket = 2;
	int cost_7ticket = 7;
	int cost_30ticket = 25;
	
	// 2*12 = 24 if the person does have more than 12 days to travel per month it's better to buy a 30daysticket
	// 2*3 = 6 if the person does have more than 3 consecutive days (at least four) to travel it's good to buy a 7days ticket 
	// otherwise it's better to buy just a dayticket

	public static int randInt(int min, int max) {

	    // Usually this can be a field rather than a method variable
	    Random rand = new Random();

	    // nextInt is normally exclusive of the top value,
	    // so add 1 to make it inclusive
	    int randomNum = rand.nextInt((max - min) + 1) + min;

	    return randomNum;
	}
	
	/*public int solution(int[] A) {
        // write your code in Java SE 8
    }*/

	public static void main(String[] args) {
		
		Test2 test = new Test2();
		
		// N is an Integer within the range [0 - 30]
		// M is an Integer within the range [1 - 30]
		
		//List<Integer> numbers= new ArrayList<Integer>();
		HashSet<Integer> numbers = new HashSet<>();
		
		int randomSize = randInt(1,30);
		
		for(int i = 0; i < randomSize; i++)
		{
		  Integer number = randInt(1,30);
		  numbers.add(number);
		}
		
		List<Integer>sortedList = new ArrayList<Integer>(numbers);
			
		System.out.println("Before Sorting:");
		   for(int counter: sortedList){
				System.out.println(counter);
			}
		//Collections.sort(numbers);
		Collections.sort(sortedList);
		
		System.out.println("\n\n After Sorting:");
		for(int counter: sortedList){
			System.out.println(counter);
		}
		
		//int[] traveldays = sortedList.stream().mapToInt(i->i).toArray();
		
		int[] degreedays = new int[] { 1, 2, 3, 4, 5 };
		for (int counter = 0; counter < degreedays.length; ++counter) {
		    int diff = counter == 0 ? 0 : degreedays[counter] - degreedays[counter - 1];
		    System.out.println("\t" + degreedays[counter] + "\t\t\t" + diff);
		} 
		   
		//test.solution(M, A)
    }
}
