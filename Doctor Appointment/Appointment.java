import java.util.*;

class info extends o
{
	Scanner s= new Scanner(System.in);              
	private String[] con = new String[10];                 // Encapsulation is implemented the variables can access only by info methods 
	private String[] a = new String[10];
	private String[] g = new String[10];
	private int[] age = new int[10];
	private Float[] weight = new Float[10];
	private int i = 0;
	public void getname()
	{
		
		System.out.println("\n Enter your name ");
		a[i]=s.next();
	}
	public void getgender()
	{
		
		System.out.println("\n Enter your gender ");
		g[i]=s.next();
	}
	public void getage()
	{
		
		System.out.println("\n Enter your age ");
		age[i]=s.nextInt();
	}
	public void getweight()
	{
		
		System.out.println("\n Enter your weight ");
		weight[i]=s.nextFloat();
	}
	public void getcon()
	{
		
		System.out.println("\n Enter the contact number ");
		con[i] = s.next();
	}
	public void display()
	{
		System.out.println("\n ****************YOUR ENTERED DETAILS**************** ");
		System.out.println("\n NAME :- "+a[i]);
		System.out.println("\n GENDER :- "+g[i]);
		System.out.println("\n AGE :- "+age[i]);
		System.out.println("\n WEIGHT :- "+weight[i]);
		System.out.println("\n CONTACT :- "+con[i]);
	} 
	public void increment()
	{
		i=i+1;
	}
	public void token()
	{
		int r=i+1;
		System.out.println("\n Your token number is "+r);
	}
	public void finish()
	{
		o q = new o();
		q.over();
	}
	public void displayall()
	{
		int count;
		int x;
		System.out.println("\n            TOTAL ENTRIES            ");
		for(count=0; count<i; count++)
		{
			x=count+1;
			System.out.println(" TOKEN NUMBER :- "+x);
			System.out.println("\n NAME :- "+a[count]);
			System.out.println("\n GENDER :- "+g[count]);
			System.out.println("\n AGE :- "+age[count]);
			System.out.println("\n WEIGHT :- "+weight[count]);
			System.out.println("\n CONTACT :- "+con[count]);
		}
	}
}
class s
{
	public void done()
	{
		System.out.println(" \n Thank you  ");
	} 
}
class o extends s               // polymorphism is implemented using method overriding 
{
	public void over()
	{
		System.out.println("\n YOUR APPOINTMENT IS FIXED ");
	}
}

/*abstract class t                                 //abstract is implemented 
{
	abstract void nm();
}
class h extends t
{
	public void nm()
	{
		System.out.println(" \n Thank you ");

	}
	t obj = new h();
	obj.nm();
}*/

class b extends info           // inheritence is implemented here by using the method of info class
{
	
	public static void main(String args[])
	{
		info c = new info();
		Scanner d = new Scanner(System.in);
		int n;
		do{
		System.out.println("\n------------MAIN MENU------------");
		System.out.println("\n 1.Add new \n 2.Dislay the list \n 3.Exit ");
		n=d.nextInt();
		switch (n)
		{
			case 1:
				System.out.println("\n APPOINMENT REGISTRATION ");
				c.getname();
				c.getgender();
				c.getage();
				c.getweight();
				c.getcon();
				c.finish();
				c.token();
				c.display();
				c.increment();

				break;
			case 2:
				c.displayall();
				break;
			case 3:
				System.exit(0);
				break;
			default:
				System.out.println("\n Invalid choice ");
				break;
		}}while(n!=3);
	}
}