* package whatever; // don't place package name! */

import java.util.*;
import java.lang.*;
import java.io.*;

/* Name of the class has to be "Main" only if the class is public. */
class Ideone
{
	public static void main (String[] args) throws java.lang.Exception
	{
		// your code goes here
		LinkedList<Integer> lstNum = new LinkedList<Integer>();
		
		lstNum.add(3);
		lstNum.add(0);
		
		lstNum.add(10);
		lstNum.add(50);
		
		lstNum.add(11);
		lstNum.add(12);
		
		lstNum.add(1);
		
		
		System.out.println(lstNum.toString() + lstNum.size());
		
		LinkedList<Integer> test = merge_sort(lstNum);
		
		System.out.println(test.toString() );
		
	}
	
	public static LinkedList<Integer> merge_sort(LinkedList<Integer> arrLst){
		
		int size = arrLst.size();
		//check the count
		int decider = size%2;
		
		if(size == 1)
		return arrLst;
		
		
		int l = decider==0?(size/2):((size/2)+1);
		
		LinkedList<Integer> left = merge_sort(new LinkedList<Integer>(arrLst.subList(0,l)));
		
		LinkedList<Integer> right = merge_sort(
	new LinkedList<Integer>(arrLst.subList(l,size)));
		
		return merge_operation(left, right);
		
	}
	
	public static LinkedList<Integer> 
	merge_operation(LinkedList<Integer> left, LinkedList<Integer> right)
	{
		
		
		LinkedList<Integer> ArrMerge = new LinkedList<Integer>();
		
		//loop to merge
		int size = left.size()+right.size();
		
		for(int i =0; i <size; i++){
			
			if(left.size()>0 && right.size() > 0){
				if(left.get(0) < right.get(0))
				{	
					ArrMerge.add(left.get(0));
					left.remove(0);
				}else{
					ArrMerge.add(right.get(0));
					right.remove(0);
				}
			
				
			}else if (left.size() > 0) 
			{
				ArrMerge.add(left.get(0));
				left.remove(0);
			}else if (right.size() > 0)
			{
				
				ArrMerge.add(right.get(0));
				right.remove(0);
			}
			
		
		}
		
	return ArrMerge;	
		
	}
	
}
