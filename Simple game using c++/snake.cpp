#include <conio.h>
#include <iostream>
#include <Windows.h>
#include <stdlib.h>
#include <string>
#include <Time.h>

#pragma warning(disable:4996)

using namespace std;


string Map[100][100];

int tailX[1000];
int tailY[1000];
int fruit[100];


//string Snake[100];

void buildMap(int width, int height){

for(int i =0; i<width; i++){
        Map[0][i] = "-";
        Map[height-1][i] = "-";

    }

    for(int j =0; j<height; j++){

        Map[j][0] = "|";
        Map[j][width-1] = "|";

    }

}

void displayMap(int width, int height){


 for(int y=0; y<height; y++){

            for(int x=0; x<width; x++){

                if(Map[y][x] == ""){
                    Map[y][x] = " ";
                }

                cout<<Map[y][x];

            }
            cout<<endl;
        }

}

void theFruit(int width, int height, int randomX, int randomY, int snakeSize){
srand(time(0));
    string forFruit = "";

    while(forFruit != "true"){

    forFruit = "false";

    randomX = (rand()%(width-1-1))+1;
    randomY = (rand()%(height-1-1))+1;

    for(int i=0; i<=snakeSize;i++){
        if(randomX == tailX[i] && randomY == tailY[i]){
            forFruit = "nope";
        }


    }

    if(forFruit == "false"){
        fruit[0] = randomX;
        fruit[1] = randomY;
        forFruit = "true";
    }



}

randomX = fruit[0];
randomY = fruit[1];

 Map[randomY][randomX] = "@";


}


main() {

    int posX=2, posY=2, mySleep, height =25, width = 40, snakeSize = 4, randomX=0, randomY=0, Score =0;
    bool isGame = true;

    string myPos = "right", p ="";
    srand(time(0));
    buildMap(width, height);




    randomX = (rand()%(width-1-17))+17;
    randomY = (rand()%(height-1-10))+10;

 // randomX = 38;
 // randomY = 2;

    Map[randomY][randomX] = "@";


    for(int i=0; i<=snakeSize; i++){

            tailX[i] = posX+i;
            tailY[i] = posY;

               Map[posY][posX+i] = "*";

           // myI = i;

        }


        Map[tailY[0]][tailX[0]] = " ";


HANDLE console = GetStdHandle(STD_OUTPUT_HANDLE);

CONSOLE_CURSOR_INFO cursorInfo;

    GetConsoleCursorInfo(console, &cursorInfo);
    cursorInfo.bVisible = false;
    SetConsoleCursorInfo(console, &cursorInfo);

    while(isGame){

    SetConsoleCursorPosition(console,{0,0});




    if(kbhit()){
int ch = getch();

    if(ch == 80){

      mySleep = 0;

    string isCollision = "false";

if((tailY[snakeSize]+1) == tailY[snakeSize-1]){
       isCollision = "true";
     }

        if(isCollision == "false"){
           myPos = "bottom";
        }



    }
    else if(ch == 72){

     mySleep = 0;

     string isCollision = "false";

     if((tailY[snakeSize]-1) == tailY[snakeSize-1]){
       isCollision = "true";
     }

        if(isCollision == "false"){
            myPos = "top";
        }



    }
    else if(ch == 75){
       // cout<<"left"<<endl;
     //  Map[posY][posX] = " ";
    //   posX--;
    mySleep = 0;

     string isCollision = "false";

    if((tailX[snakeSize]-1) == tailX[snakeSize-1]){
       isCollision = "true";
     }

        if(isCollision == "false"){
           myPos ="left";
        }



    }
    else if(ch == 77){

     mySleep = 0;

          string isCollision = "false";

if((tailX[snakeSize]+1) == tailX[snakeSize-1]){
       isCollision = "true";
     }

        if(isCollision == "false"){
           myPos = "right";
        }



    }
    else if(ch == 32){
       // system("PAUSE");

    p = "pause";
    }
    }

    else{
    mySleep = 200;





      if(myPos == "top"){



            for(int i = snakeSize-2; i>=0; i--){
           if((tailY[snakeSize]-1) == tailY[i] && tailX[snakeSize] == tailX[i]){
       //cout<<"game over";
      isGame = false;
     }

        }


            if((tailX[snakeSize]) == randomX && tailY[snakeSize] == randomY){

                    //should be tail

                    //tailX[0] = tailX[1]

        //tailY[snakeSize] = tailY[snakeSize];
       // tailX[snakeSize] = tailX[snakeSize]+1;

        snakeSize++;
        /*
        Map[randomY][randomX] = "*";
        Map[randomY-1][randomX] = "*";

        tailY[snakeSize] = randomY-1;
        tailX[snakeSize] = randomX;

        */

        for(int i=snakeSize; i>0; i--){
        tailY[i] = tailY[i-1];
        tailX[i] = tailX[i-1];

      }
      tailY[0] = tailY[1];
      tailX[0] = tailX[1];

      Map[tailY[0]][tailX[0]] = "*";


        theFruit(width, height, randomX, randomY, snakeSize);

randomX = fruit[0];
randomY = fruit[1];


      //  Map[tailY[snakeSize]][tailX[snakeSize]+1] = "*";

      if((tailY[snakeSize]) == 0){

Map[tailY[snakeSize]][tailX[snakeSize]] = "-";
 tailY[snakeSize] = height-2;

}

Score++;

      }



      for(int i=0; i<snakeSize; i++){



        tailY[i] = tailY[i+1];
        tailX[i] = tailX[i+1];

      }
      Map[tailY[0]][tailX[0]] = " ";

if((tailY[snakeSize]-1) == 0){

 tailY[snakeSize] = height-2;
 tailX[snakeSize] = tailX[snakeSize];

}
else{
   tailY[snakeSize] = tailY[snakeSize]-1;
    tailX[snakeSize] = tailX[snakeSize];
}

Map[tailY[snakeSize]][tailX[snakeSize]] = "*";




      }
      else if(myPos == "bottom"){


             for(int i = snakeSize-2; i>=0; i--){
           if((tailY[snakeSize]+1) == tailY[i] && tailX[snakeSize] == tailX[i]){
       //cout<<"game over";
      isGame = false;
     }

        }


             if((tailX[snakeSize]) == randomX && tailY[snakeSize] == randomY){

        //tailY[snakeSize] = tailY[snakeSize];
       // tailX[snakeSize] = tailX[snakeSize]+1;

        snakeSize++;

        /*
        Map[randomY][randomX] = "*";
        Map[randomY+1][randomX] = "*";

        tailY[snakeSize] = randomY+1;
        tailX[snakeSize] = randomX;
        */
         for(int i=snakeSize; i>0; i--){
        tailY[i] = tailY[i-1];
        tailX[i] = tailX[i-1];

      }
      tailY[0] = tailY[1];
      tailX[0] = tailX[1];

      Map[tailY[0]][tailX[0]] = "*";


 theFruit(width, height, randomX, randomY, snakeSize);

randomX = fruit[0];
randomY = fruit[1];


      //  Map[tailY[snakeSize]][tailX[snakeSize]+1] = "*";

      if((tailY[snakeSize]) == height-1){

Map[tailY[snakeSize]][tailX[snakeSize]] = "-";
 tailY[snakeSize] = 1;

}
Score++;

      }



    //  int myI = 0;


      for(int i=0; i<snakeSize; i++){
        tailY[i] = tailY[i+1];
        tailX[i] = tailX[i+1];

      }
      Map[tailY[0]][tailX[0]] = " ";



if((tailY[snakeSize]+1) == height-1){

 tailY[snakeSize] = 1;
 tailX[snakeSize] = tailX[snakeSize];

}
else{
    tailY[snakeSize] = tailY[snakeSize]+1;
    tailX[snakeSize] = tailX[snakeSize];
}
Map[tailY[snakeSize]][tailX[snakeSize]] = "*";


      }
      else if(myPos == "left"){

            for(int i = snakeSize-2; i>=0; i--){
           if((tailX[snakeSize]-1) == tailX[i] && tailY[snakeSize] == tailY[i]){
       //cout<<"game over";
      isGame = false;
     }

        }


             if((tailX[snakeSize]) == randomX && tailY[snakeSize] == randomY){

        //tailY[snakeSize] = tailY[snakeSize];
       // tailX[snakeSize] = tailX[snakeSize]+1;

        snakeSize++;
        /*
        Map[randomY][randomX] = "*";
        Map[randomY][randomX-1] = "*";

        tailY[snakeSize] = randomY;
        tailX[snakeSize] = randomX-1;
*/
 for(int i=snakeSize; i>0; i--){
        tailY[i] = tailY[i-1];
        tailX[i] = tailX[i-1];

      }
      tailY[0] = tailY[1];
      tailX[0] = tailX[1];

      Map[tailY[0]][tailX[0]] = "*";

theFruit(width, height, randomX, randomY, snakeSize);

randomX = fruit[0];
randomY = fruit[1];


      //  Map[tailY[snakeSize]][tailX[snakeSize]+1] = "*";

      if((tailX[snakeSize]) == 0){

Map[tailY[snakeSize]][tailX[snakeSize]] = "|";
 tailX[snakeSize] = width-2;

}

Score++;

      }





      for(int i=0; i<snakeSize; i++){
        tailY[i] = tailY[i+1];
        tailX[i] = tailX[i+1];

      }
      Map[tailY[0]][tailX[0]] = " ";

if((tailX[snakeSize]-1) == 0){

tailY[snakeSize] = tailY[snakeSize];
 tailX[snakeSize] = width-2;

}
else{
    tailY[snakeSize] = tailY[snakeSize];
    tailX[snakeSize] = tailX[snakeSize]-1;

}
Map[tailY[snakeSize]][tailX[snakeSize]] = "*";


      }
      else if(myPos == "right"){


              for(int i = snakeSize-2; i>=0; i--){
           if((tailX[snakeSize]+1) == tailX[i] && tailY[snakeSize] == tailY[i]){
       //cout<<"game over";
      isGame = false;
     }

        }



        if((tailX[snakeSize]) == randomX && tailY[snakeSize] == randomY){

        //tailY[snakeSize] = tailY[snakeSize];
       // tailX[snakeSize] = tailX[snakeSize]+1;

        snakeSize++;
        /*
        Map[randomY][randomX] = "*";
        Map[randomY][randomX+1] = "*";

        tailY[snakeSize] = randomY;
        tailX[snakeSize] = randomX+1;
*/
 for(int i=snakeSize; i>0; i--){
        tailY[i] = tailY[i-1];
        tailX[i] = tailX[i-1];

      }
      tailY[0] = tailY[1];
      tailX[0] = tailX[1];

      Map[tailY[0]][tailX[0]] = "*";

 theFruit(width, height, randomX, randomY, snakeSize);

randomX = fruit[0];
randomY = fruit[1];

      //  Map[tailY[snakeSize]][tailX[snakeSize]+1] = "*";

      if((tailX[snakeSize]) == width-1){

Map[tailY[snakeSize]][tailX[snakeSize]] = "|";
 tailX[snakeSize] = 1;

}

Score++;

      }




  //  cout<<tailX[0]<<endl;
   // cout<<tailX[1]<<endl;



      for(int i=0; i<snakeSize; i++){
        tailY[i] = tailY[i+1];
        tailX[i] = tailX[i+1];

      }



      Map[tailY[0]][tailX[0]] = " ";





if((tailX[snakeSize]+1) == width-1){

    tailY[snakeSize] = tailY[snakeSize];
    tailX[snakeSize] = 1;

}
else{
        tailY[snakeSize] = tailY[snakeSize];
        tailX[snakeSize] = tailX[snakeSize]+1;
}

Map[tailY[snakeSize]][tailX[snakeSize]] = "*";

      }
    }










displayMap(width, height);

cout<<endl;
cout<<"Score: "<<Score<<endl;
if(p == "pause"){
//cout<<"pause";
p= "";
system("PAUSE");


}
Sleep(mySleep);


    }
Sleep(1000);

if(isGame == false){
    system("CLS");
    cout<<"Game Over"<<endl;
    cout<<"Score: "<<Score;
}



    return 0;
}

