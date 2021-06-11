import 'package:flutter/material.dart';
import 'colorScheme.dart';
import 'HomePage.dart';
import 'LoginPage.dart';
import 'package:doc_appointment/patient/GetFreeQuote.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'MyHospitalNow',
      theme: ThemeData(
        fontFamily: 'avenir',
      ),
      home: MyHomePage(),
      routes: {
        '/home_page': (context) => HomePage(),
        '/LoginPage': (context) => LoginPage(),
        '/get_free_quote': (context) => GetFreeQuote(),
      },
    );
  }
}

class MyHomePage extends StatefulWidget {
  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
        backgroundColor: bgColor,
        body: Column(
          children: <Widget>[
            Stack(
              children: <Widget>[
                Container(
                  height: MediaQuery.of(context).size.height,
                  width: MediaQuery.of(context).size.width,
                  child: CustomPaint(
                    painter: pathPainter(),
                  ),
                ),
                Container(
                  padding: EdgeInsets.all(30),
                  margin: EdgeInsets.only(top: 20),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: <Widget>[
                      Text(
                        "Doctor's Appointment in 2 Minutes",
                        style: TextStyle(
                          fontSize: 28,
                          fontWeight: FontWeight.w900,
                        ),
                      ),
                      Text(
                        "Finding a Doctor was never \n so easy",
                        style: TextStyle(
                          fontSize: 22,
                          fontWeight: FontWeight.w500,
                        ),
                      )
                    ],
                  ),
                ),
                Positioned(
                  bottom: MediaQuery.of(context).size.height * 0.2,
                  child: Container(
                      width: MediaQuery.of(context).size.width,
                      child: Center(
                        child: Image.asset('assets/images/onBoardDoc.png',
                            height: 300, width: 300),
                      )),
                ),
                Positioned(
                  bottom: 0,
                  right: 0,
                  child: InkWell(
                    child: Container(
                      height: 80,
                      width: 200,
                      decoration: BoxDecoration(
                          gradient: LinearGradient(
                            stops: [0, 1],
                            colors: [getStartedColorStart, getStartedColorEnd],
                          ),
                          borderRadius: BorderRadius.only(
                            topLeft: Radius.circular(25),
                          )),
                      child: Center(
                        child: Text(
                          "Get Free Quotes",
                          style: TextStyle(
                            color: Colors.white,
                            fontSize: 20,
                            fontWeight: FontWeight.w800,
                          ),
                        ),
                      ),
                    ),
                    onTap: openFreeQuote,
                  ),
                ),
              ],
            )
          ],
        ),
        /* Drawer start*/
        drawer: Drawer(
          // Add a ListView to the drawer. This ensures the user can scroll
          // through the options in the drawer if there isn't enough vertical
          // space to fit everything.
          child: ListView(
            // Important: Remove any padding from the ListView.
            padding: EdgeInsets.zero,
            children: <Widget>[
              DrawerHeader(
                child: Text('MyHospitalNow'),
                decoration: BoxDecoration(
                  color: Colors.blue,
                ),
              ),
              ListTile(
                title: Text('Login'),
                onTap: openLogin,
              ),
              ListTile(
                title: Text('Contact Us'),
                onTap: () {
                  // Update the state of the app.
                  // ...
                },
              ),
            ],
          ),
        ));
  }

  void openHomePage() {
    Navigator.pushNamed(context, '/home_page');
  }

  void openLogin() {
    Navigator.pushNamed(context, '/LoginPage');
  }

  void openFreeQuote() {
    Navigator.pushNamed(context, '/get_free_quote');
  }
}

// ignore: camel_case_types
class pathPainter extends CustomPainter {
  @override
  void paint(Canvas canvas, Size size) {
    var paint = Paint();
    paint.color = pathColor;
    paint.style = PaintingStyle.fill;
    var path = Path();
    path.moveTo(0, size.height * 0.4);
    path.quadraticBezierTo(size.width * 0.35, size.height * 0.40,
        size.width * 0.58, size.height * 0.6);
    path.quadraticBezierTo(size.width * 0.72, size.height * 0.8,
        size.width * 0.92, size.height * 0.8);
    path.quadraticBezierTo(
        size.width * 0.98, size.height * 0.8, size.width, size.height * 0.82);
    path.lineTo(size.width, size.height);
    path.lineTo(0, size.height);
    path.close();
    canvas.drawPath(path, paint);
  }

  @override
  bool shouldRepaint(CustomPainter oldDelegate) {
    // ignore: todo
    // TODO : implement shouldRepaint
    return true;
  }
}
