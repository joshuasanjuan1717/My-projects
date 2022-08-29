#include <Time.h>
#include <Windows.h>
#include <conio.h>
#include <stdlib.h>

#include <iostream>
#include <string>

#pragma warning(disable : 4996)

using namespace std;

string Map[1000][1000];

int snakeX[1000];
int snakeY[1000];
int fruit[100];

// string Snake[100];

void buildMap(int width, int height) {
   for (int i = 0; i < width; i++) {
      Map[0][i] = "-";
      Map[height - 1][i] = "-";
   }

   for (int j = 0; j < height; j++) {
      Map[j][0] = "|";
      Map[j][width - 1] = "|";
   }
}

void displayMap(int width, int height) {
   for (int y = 0; y < height; y++) {
      for (int x = 0; x < width; x++) {
         if (Map[y][x] == "") {
            Map[y][x] = " ";
         }

         cout << Map[y][x];
      }
      cout << endl;
   }
}

void theFruit(int width, int height, int randomX, int randomY, int snakeSize) {
   srand(time(0));
   string forFruit = "";

   while (forFruit != "true") {
      forFruit = "false";

      randomX = (rand() % (width - 1 - 1)) + 1;
      randomY = (rand() % (height - 1 - 1)) + 1;

      for (int i = 0; i <= snakeSize; i++) {
         if (randomX == snakeX[i] && randomY == snakeY[i]) {
            forFruit = "nope";
         }
      }

      if (forFruit == "false") {
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
   int posX = 2, posY = 2, mySleep, height = 25, width = 40, snakeSize = 4, randomX = 0, randomY = 0, Score = 0;
   bool isGame = true;

   string myPos = "right", p = "";
   srand(time(0));
   buildMap(width, height);

   randomX = (rand() % (width - 1 - 17)) + 17;
   randomY = (rand() % (height - 1 - 10)) + 10;

   // randomX = 38;
   // randomY = 2;

   Map[randomY][randomX] = "@";

   for (int i = 0; i <= snakeSize; i++) {
      snakeX[i] = posX + i;
      snakeY[i] = posY;

      Map[posY][posX + i] = "*";

      // myI = i;
   }

   Map[snakeY[0]][snakeX[0]] = " ";

   HANDLE console = GetStdHandle(STD_OUTPUT_HANDLE);

   CONSOLE_CURSOR_INFO cursorInfo;

   GetConsoleCursorInfo(console, &cursorInfo);
   cursorInfo.bVisible = false;
   SetConsoleCursorInfo(console, &cursorInfo);

   while (isGame) {
      SetConsoleCursorPosition(console, {0, 0});

      if (kbhit()) {
         int ch = getch();

         if (ch == 80) {
            mySleep = 0;

            string isCollision = "false";

            if ((snakeY[snakeSize] + 1) == snakeY[snakeSize - 1]) {
               isCollision = "true";
            }

            if (isCollision == "false") {
               myPos = "bottom";
            }

         } else if (ch == 72) {
            mySleep = 0;

            string isCollision = "false";

            if ((snakeY[snakeSize] - 1) == snakeY[snakeSize - 1]) {
               isCollision = "true";
            }

            if (isCollision == "false") {
               myPos = "top";
            }

         } else if (ch == 75) {
            // cout<<"left"<<endl;
            //  Map[posY][posX] = " ";
            //   posX--;
            mySleep = 0;

            string isCollision = "false";

            if ((snakeX[snakeSize] - 1) == snakeX[snakeSize - 1]) {
               isCollision = "true";
            }

            if (isCollision == "false") {
               myPos = "left";
            }

         } else if (ch == 77) {
            mySleep = 0;

            string isCollision = "false";

            if ((snakeX[snakeSize] + 1) == snakeX[snakeSize - 1]) {
               isCollision = "true";
            }

            if (isCollision == "false") {
               myPos = "right";
            }

         } else if (ch == 32) {
            // system("PAUSE");

            p = "pause";
         }
      }

      else {
         mySleep = 200;

         if (myPos == "top") {
            for (int i = snakeSize - 2; i >= 0; i--) {
               if ((snakeY[snakeSize] - 1) == snakeY[i] && snakeX[snakeSize] == snakeX[i]) {
                  // cout<<"game over";
                  isGame = false;
               }
            }

            if ((snakeX[snakeSize]) == randomX && snakeY[snakeSize] == randomY) {
               // should be tail

               // snakeX[0] = snakeX[1]

               // snakeY[snakeSize] = snakeY[snakeSize];
               // snakeX[snakeSize] = snakeX[snakeSize]+1;

               snakeSize++;
               /*
               Map[randomY][randomX] = "*";
               Map[randomY-1][randomX] = "*";

               snakeY[snakeSize] = randomY-1;
               snakeX[snakeSize] = randomX;

               */

               for (int i = snakeSize; i > 0; i--) {
                  snakeY[i] = snakeY[i - 1];
                  snakeX[i] = snakeX[i - 1];
               }
               snakeY[0] = snakeY[1];
               snakeX[0] = snakeX[1];

               Map[snakeY[0]][snakeX[0]] = "*";

               theFruit(width, height, randomX, randomY, snakeSize);

               randomX = fruit[0];
               randomY = fruit[1];

               //  Map[snakeY[snakeSize]][snakeX[snakeSize]+1] = "*";

               if ((snakeY[snakeSize]) == 0) {
                  Map[snakeY[snakeSize]][snakeX[snakeSize]] = "-";
                  snakeY[snakeSize] = height - 2;
               }

               Score++;
            }

            for (int i = 0; i < snakeSize; i++) {
               snakeY[i] = snakeY[i + 1];
               snakeX[i] = snakeX[i + 1];
            }
            Map[snakeY[0]][snakeX[0]] = " ";

            if ((snakeY[snakeSize] - 1) == 0) {
               snakeY[snakeSize] = height - 2;
               snakeX[snakeSize] = snakeX[snakeSize];

            } else {
               snakeY[snakeSize] = snakeY[snakeSize] - 1;
               snakeX[snakeSize] = snakeX[snakeSize];
            }

            Map[snakeY[snakeSize]][snakeX[snakeSize]] = "*";

         } else if (myPos == "bottom") {
            for (int i = snakeSize - 2; i >= 0; i--) {
               if ((snakeY[snakeSize] + 1) == snakeY[i] && snakeX[snakeSize] == snakeX[i]) {
                  // cout<<"game over";
                  isGame = false;
               }
            }

            if ((snakeX[snakeSize]) == randomX && snakeY[snakeSize] == randomY) {
               // snakeY[snakeSize] = snakeY[snakeSize];
               // snakeX[snakeSize] = snakeX[snakeSize]+1;

               snakeSize++;

               /*
               Map[randomY][randomX] = "*";
               Map[randomY+1][randomX] = "*";

               snakeY[snakeSize] = randomY+1;
               snakeX[snakeSize] = randomX;
               */
               for (int i = snakeSize; i > 0; i--) {
                  snakeY[i] = snakeY[i - 1];
                  snakeX[i] = snakeX[i - 1];
               }
               snakeY[0] = snakeY[1];
               snakeX[0] = snakeX[1];

               Map[snakeY[0]][snakeX[0]] = "*";

               theFruit(width, height, randomX, randomY, snakeSize);

               randomX = fruit[0];
               randomY = fruit[1];

               //  Map[snakeY[snakeSize]][snakeX[snakeSize]+1] = "*";

               if ((snakeY[snakeSize]) == height - 1) {
                  Map[snakeY[snakeSize]][snakeX[snakeSize]] = "-";
                  snakeY[snakeSize] = 1;
               }
               Score++;
            }

            //  int myI = 0;

            for (int i = 0; i < snakeSize; i++) {
               snakeY[i] = snakeY[i + 1];
               snakeX[i] = snakeX[i + 1];
            }
            Map[snakeY[0]][snakeX[0]] = " ";

            if ((snakeY[snakeSize] + 1) == height - 1) {
               snakeY[snakeSize] = 1;
               snakeX[snakeSize] = snakeX[snakeSize];

            } else {
               snakeY[snakeSize] = snakeY[snakeSize] + 1;
               snakeX[snakeSize] = snakeX[snakeSize];
            }
            Map[snakeY[snakeSize]][snakeX[snakeSize]] = "*";

         } else if (myPos == "left") {
            for (int i = snakeSize - 2; i >= 0; i--) {
               if ((snakeX[snakeSize] - 1) == snakeX[i] && snakeY[snakeSize] == snakeY[i]) {
                  // cout<<"game over";
                  isGame = false;
               }
            }

            if ((snakeX[snakeSize]) == randomX && snakeY[snakeSize] == randomY) {
               // snakeY[snakeSize] = snakeY[snakeSize];
               // snakeX[snakeSize] = snakeX[snakeSize]+1;

               snakeSize++;
               /*
               Map[randomY][randomX] = "*";
               Map[randomY][randomX-1] = "*";

               snakeY[snakeSize] = randomY;
               snakeX[snakeSize] = randomX-1;
       */
               for (int i = snakeSize; i > 0; i--) {
                  snakeY[i] = snakeY[i - 1];
                  snakeX[i] = snakeX[i - 1];
               }
               snakeY[0] = snakeY[1];
               snakeX[0] = snakeX[1];

               Map[snakeY[0]][snakeX[0]] = "*";

               theFruit(width, height, randomX, randomY, snakeSize);

               randomX = fruit[0];
               randomY = fruit[1];

               //  Map[snakeY[snakeSize]][snakeX[snakeSize]+1] = "*";

               if ((snakeX[snakeSize]) == 0) {
                  Map[snakeY[snakeSize]][snakeX[snakeSize]] = "|";
                  snakeX[snakeSize] = width - 2;
               }

               Score++;
            }

            for (int i = 0; i < snakeSize; i++) {
               snakeY[i] = snakeY[i + 1];
               snakeX[i] = snakeX[i + 1];
            }
            Map[snakeY[0]][snakeX[0]] = " ";

            if ((snakeX[snakeSize] - 1) == 0) {
               snakeY[snakeSize] = snakeY[snakeSize];
               snakeX[snakeSize] = width - 2;

            } else {
               snakeY[snakeSize] = snakeY[snakeSize];
               snakeX[snakeSize] = snakeX[snakeSize] - 1;
            }
            Map[snakeY[snakeSize]][snakeX[snakeSize]] = "*";

         } else if (myPos == "right") {
            for (int i = snakeSize - 2; i >= 0; i--) {
               if ((snakeX[snakeSize] + 1) == snakeX[i] && snakeY[snakeSize] == snakeY[i]) {
                  // cout<<"game over";
                  isGame = false;
               }
            }

            if ((snakeX[snakeSize]) == randomX && snakeY[snakeSize] == randomY) {
               // snakeY[snakeSize] = snakeY[snakeSize];
               // snakeX[snakeSize] = snakeX[snakeSize]+1;

               snakeSize++;
               /*
               Map[randomY][randomX] = "*";
               Map[randomY][randomX+1] = "*";

               snakeY[snakeSize] = randomY;
               snakeX[snakeSize] = randomX+1;
       */
               for (int i = snakeSize; i > 0; i--) {
                  snakeY[i] = snakeY[i - 1];
                  snakeX[i] = snakeX[i - 1];
               }
               snakeY[0] = snakeY[1];
               snakeX[0] = snakeX[1];

               Map[snakeY[0]][snakeX[0]] = "*";

               theFruit(width, height, randomX, randomY, snakeSize);

               randomX = fruit[0];
               randomY = fruit[1];

               //  Map[snakeY[snakeSize]][snakeX[snakeSize]+1] = "*";

               if ((snakeX[snakeSize]) == width - 1) {
                  Map[snakeY[snakeSize]][snakeX[snakeSize]] = "|";
                  snakeX[snakeSize] = 1;
               }

               Score++;
            }

            //  cout<<snakeX[0]<<endl;
            // cout<<snakeX[1]<<endl;

            for (int i = 0; i < snakeSize; i++) {
               snakeY[i] = snakeY[i + 1];
               snakeX[i] = snakeX[i + 1];
            }

            Map[snakeY[0]][snakeX[0]] = " ";

            if ((snakeX[snakeSize] + 1) == width - 1) {
               snakeY[snakeSize] = snakeY[snakeSize];
               snakeX[snakeSize] = 1;

            } else {
               snakeY[snakeSize] = snakeY[snakeSize];
               snakeX[snakeSize] = snakeX[snakeSize] + 1;
            }

            Map[snakeY[snakeSize]][snakeX[snakeSize]] = "*";
         }
      }

      displayMap(width, height);

      cout << endl;
      cout << "Score: " << Score << endl;
      if (p == "pause") {
         // cout<<"pause";
         p = "";
         system("PAUSE");
      }
      Sleep(mySleep);
   }
   Sleep(1000);

   if (isGame == false) {
      system("CLS");
      cout << "Game Over" << endl;
      cout << "Score: " << Score;
   }

   return 0;
}
