package palindrome;

import java.util.Scanner;

public class Palindrome {
	public static void main(String[] args) {		
		//Scanner scanner = new Scanner(System.in);
		//int l = scanner.nextLine().toString().length();
		//System.out.println(l);
		//check(l/2, scanner.nextLine());
		
		String input = "abecba";
		System.out.println(input.length());
		check(0,input);
	}
	
	public static void check(int n, String i) {
		if(i.charAt(1+n) == i.charAt(i.length()-n)) {
			System.out.println(n);
			check(n+1,i);
		}else if(n == i.length()/2) {
			System.out.println("yes");
		}else {
			System.out.println("no");
			return;
		}
	}
}
