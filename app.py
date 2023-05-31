2.	#include <iostream>
3.	#include <limits> 
4.	
5.	using namespace std;
6.	
7.	void print_char(char c, int col, int row) {
8.	    col = min(col, 80);
9.	    row = min(row, 20);
10.	
11.	    for (int i = 0; i < row; i++) {
12.	        for (int j = 0; j < col; j++) {
13.	            cout << c;
14.	        }
15.	        cout << endl;
16.	    }
17.	}
18.	
19.	int main() {
20.	    char c;
21.	    int col, row;
22.	
23.	    while (true) {
24.	        cout << "Karakteri Girin: ";
25.	        if (!(cin >> c)) {
26.	            cout << "Geçersiz bir karakter girdiniz. Lütfen tekrar deneyin." << endl;
27.	            cin.clear();
28.	            cin.ignore(numeric_limits<streamsize>::max(), '\n');
29.	            continue;
30.	        }
31.	
32.	        cout << "Karakterin kaç kez yazdırılacağını girin (Maksimum 80): ";
33.	        if (!(cin >> col) || col < 1 || col > 80) {
34.	            cout << "Geçersiz bir değer girdiniz. Lütfen 1-80 arasında bir sayı girin." << endl;
35.	            cin.clear();
36.	            cin.ignore(numeric_limits<streamsize>::max(), '\n');
37.	            continue;
38.	        }
39.	
40.	        cout << "Yazdırılacak satır sayısını girin (Maksimum 20): ";
41.	        if (!(cin >> row) || row < 1 || row > 20) {
42.	            cout << "Geçersiz bir değer girdiniz. Lütfen 1-20 arasında bir sayı girin." << endl;
43.	            cin.clear();
44.	            cin.ignore(numeric_limits<streamsize>::max(), '\n');
45.	            continue;
46.	        }
47.	
48.	        print_char(c, col, row);
49.	        break;
50.	    }
51.	
52.	    return 0;
53.	}
