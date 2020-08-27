#include <windows.h>
#include <iostream>
#include <fstream>
#include <bits/stdc++.h>
using namespace std;
#include <windows.h>
int time_limit;
bool ontime = true;
HANDLE myHandle, myHandle2;
ofstream res;
string inputs[100000000];
DWORD WINAPI timer(LPVOID lpParameter)
{
	time_t timer;
    struct tm y2k = {0};
    double seconds1, seconds2;
    y2k.tm_hour = 0;   y2k.tm_min = 0; y2k.tm_sec = 0;
    y2k.tm_year = 100; y2k.tm_mon = 0; y2k.tm_mday = 1;
    time(&timer);  /* get current time; same as: timer = time(NULL)  */
    seconds1 = difftime(timer,mktime(&y2k));
    seconds2 = seconds1;
	unsigned int& myCounter = *((unsigned int*)lpParameter);
	while((seconds2 - seconds1)*1000 < time_limit){
		time(&timer);  /* get current time; same as: timer = time(NULL)  */
    	seconds2 = difftime(timer,mktime(&y2k));
	}
	CloseHandle(myHandle);
	res.open("result.txt");
	res << "Time Limit Exceeded";
}
DWORD WINAPI judge2(LPVOID lpParameter){
	unsigned int& myCounter = *((unsigned int*)lpParameter);
	system("judge2.exe");
}
int main(){
	ifstream fin;
	int i = 1;
	string language, name;
	fin.open("info.txt");
	fin >> language;
	fin >> name;
	fin >> time_limit;
	fin.close();
	DWORD myThreadID, myThreadID2;
	int idx = 1;
	myHandle2 = CreateThread(0, 0, judge2, 0, 0, &myThreadID2);
	string status = "Accepted";
	if(language == "C" || language == "C++"){
		string q = ".\\lans\\Cpp\\MinGW64\\bin\\g++.exe ";
		q += name+".cpp -o " + name + ".exe";
		system(q.c_str());
		ifstream inp;
		inp.open("input.txt");
		ifstream ans;
		ans.open("answer.txt");
		while(inp){
			string s;
			string i = "00000";
			while (i.length() > 1){
				getline(inp, i);
				s += i;
			}
			ofstream out;
			out.open("in.txt");
			out << s;
			out.close();
			string w = " < in.txt > out.txt";
			string cmd = ".\\" + name+".exe";
			cmd += w;
			myHandle = CreateThread(0, 0, timer, 0, 0, &myThreadID);
			system(cmd.c_str());
			CloseHandle(myHandle);
			string s1;
			i = "00000";
			while (i.length() > 1){
				getline(ans, i);
				s1 += i;
			}
			string s2;
			ifstream ut;
			ut.open("out.txt");
			i = "00000";
			while (i.length() > 1){
				getline(ut, i);
				s2 += i;
			}
			if(s1 != s2){
				status = "Wrong Answer";
			}
			if(status != "Accepted"){
				break;
			}
			res.open("result.txt");
			res << "Judging Test "+ idx;
			res.close();
			ut.close();
			idx++;
		}
		inp.close();
		ans.close();
		ofstream res;
		res.open("result.txt");
		res << status;
		ans.close();
		res.close();
	}
	if(language == "Python"){
		ifstream inp;
		inp.open("input.txt");
		ifstream ans;
		ans.open("answer.txt");
		while(inp){
			string s;
			string i = "00000";
			while (i.length() > 1){
				getline(inp, i);
				s += i;
			}
			ofstream out;
			out.open("in.txt");
			out << s;
			out.close();
			string w = name+".py < in.txt > out.txt";
			string cmd = ".\\lans\\Python\\python.exe ";
			cmd += w;
			myHandle = CreateThread(0, 0, timer, 0, 0, &myThreadID);
			system(cmd.c_str());
			CloseHandle(myHandle);
			string s1;
			i = "00000";
			while (i.length() > 1){
				getline(ans, i);
				s1 += i;
			}
			string s2;
			ifstream ut;
			ut.open("out.txt");
			i = "00000";
			while (i.length() > 1){
				getline(ut, i);
				s2 += i;
			}
			if(s1 != s2){
				status = "Wrong Answer";
			}
			if(status != "Accepted"){
				break;
			}
			res.open("result.txt");
			res << "Judging Test "+ idx;
			res.close();
			ut.close();
			idx++;
		}
		inp.close();
		ans.close();
		ofstream res;
		res.open("result.txt");
		res << status;
		res.close();
	}
	if(language == "Java"){
		string q = ".\\lans\\Java\\bin\\javac.exe ";
		q += name+".java";
		system(q.c_str());
		ifstream inp;
		inp.open("input.txt");
		ifstream ans;
		ans.open("answer.txt");
		while(inp){
			string s;
			string i = "00000";
			while (i.length() > 1){
				getline(inp, i);
				s += i;
			}
			ofstream out;
			out.open("in.txt");
			out << s;
			out.close();
			string w = name+" < in.txt > out.txt";
			string cmd = ".\\lans\\Python\\java.exe ";
			cmd += w;
			myHandle = CreateThread(0, 0, timer, 0, 0, &myThreadID);
			system(cmd.c_str());
			CloseHandle(myHandle);
			string s1;
			i = "00000";
			while (i.length() > 1){
				getline(ans, i);
				s1 += i;
			}
			string s2;
			ifstream ut;
			ut.open("out.txt");
			i = "00000";
			while (i.length() > 1){
				getline(ut, i);
				s2 += i;
			}
			if(s1 != s2){
				status = "Wrong Answer";
			}
			if(status != "Accepted"){
				break;
			}
			res.open("result.txt");
			res << "Judging Test "+ idx;
			res.close();
			ut.close();
			idx++;
		}
		inp.close();
		ans.close();
		ofstream res;
		res.open("result.txt");
		res << status;
		res.close();
	}
	if(language == "Ruby"){
		ifstream inp;
		inp.open("input.txt");
		ifstream ans;
		ans.open("answer.txt");
		while(inp){
			string s;
			string i = "00000";
			while (i.length() > 1){
				getline(inp, i);
				s += i;
			}
			ofstream out;
			out.open("in.txt");
			out << s;
			out.close();
			string w = name+".rb < in.txt > out.txt";
			string cmd = ".\\lans\\Ruby\\bin\\ruby.exe ";
			cmd += w;
			myHandle = CreateThread(0, 0, timer, 0, 0, &myThreadID);
			system(cmd.c_str());
			CloseHandle(myHandle);
			string s1;
			i = "00000";
			while (i.length() > 1){
				getline(ans, i);
				s1 += i;
			}
			string s2;
			ifstream ut;
			ut.open("out.txt");
			i = "00000";
			while (i.length() > 1){
				getline(ut, i);
				s2 += i;
			}
			if(s1 != s2){
				status = "Wrong Answer";
			}
			if(status != "Accepted"){
				break;
			}
			res.open("result.txt");
			res << "Judging Test "+ idx;
			res.close();
			ut.close();
			idx++;
		}
		inp.close();
		ans.close();
		ofstream res;
		res.open("result.txt");
		res << status;
		res.close();
	}
	CloseHandle(myHandle2);
}
