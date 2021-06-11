import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'colorScheme.dart';

class DocInfoPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: ThemeData(fontFamily: 'avenir'),
      home: docInfoPage(),
    );
  }
}

class docInfoPage extends StatefulWidget {
  @override
  _docInfoPageState createState() => _docInfoPageState();
}

class _docInfoPageState extends State<docInfoPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
          height: MediaQuery.of(context).size.height,
          width: MediaQuery.of(context).size.width,
          decoration: BoxDecoration(
              gradient: LinearGradient(
            colors: [getStartedColorStart, getStartedColorEnd],
            begin: Alignment(0, -1.15),
            end: Alignment(0, 0.1),
          )),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisAlignment: MainAxisAlignment.start,
            children: <Widget>[
              Container(
                height: MediaQuery.of(context).size.height * 0.4,
                width: MediaQuery.of(context).size.width,
                child: Container(
                  padding: EdgeInsets.all(20),
                  child: Image.asset("assets/images/docinfo/bg1.png"),
                ),
              ),
              Container(
                height: MediaQuery.of(context).size.height * 0.6,
                width: MediaQuery.of(context).size.width,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.only(
                    topLeft: Radius.circular(40),
                    topRight: Radius.circular(40),
                  ),
                  color: bgColor,
                ),
                child: Container(
                  padding: EdgeInsets.all(10),
                  child: SingleChildScrollView(
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: <Widget>[
                        Row(
                          children: <Widget>[
                            Container(
                              height: 100,
                              width: 100,
                              child: Image.asset(
                                  "assets/images/docprofile/doc1.png"),
                            ),
                            Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: <Widget>[
                                Text(
                                  "Dr. Susan",
                                  style: TextStyle(
                                    fontSize: 20,
                                    fontWeight: FontWeight.w400,
                                  ),
                                ),
                                Text(
                                  "Heart Surgeon - CK Hospital",
                                  style: TextStyle(
                                    fontSize: 17,
                                    fontWeight: FontWeight.w400,
                                  ),
                                ),
                              ],
                            ),
                          ],
                        ),
                        Padding(
                          padding: EdgeInsets.only(left: 8, right: 8),
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: <Widget>[
                              Text(
                                "About the Doctor",
                                style: TextStyle(
                                  fontSize: 18,
                                  fontWeight: FontWeight.w800,
                                ),
                              ),
                              SizedBox(
                                height: 10,
                              ),
                              Text(
                                "Please write the description about doctor here. this will be a detailed information about doctor and the roles and achievements that the doctor has had over the past years.",
                                style: TextStyle(
                                  fontSize: 14,
                                  fontWeight: FontWeight.w400,
                                ),
                              ),
                              SizedBox(
                                height: 10,
                              ),
                              Text(
                                "Available Time Slots",
                                style: TextStyle(
                                  fontSize: 18,
                                  fontWeight: FontWeight.w800,
                                ),
                              ),
                              SizedBox(
                                height: 5,
                              ),
                              timeSlotWidget("13", "May", "Consultation",
                                  "Sunday 9 am to 11:30 am"),
                            ],
                          ),
                        )
                      ],
                    ),
                  ),
                ),
              ),
            ],
          )),
    );
  }

  Container timeSlotWidget(
      String date, String month, String slotType, String time) {
    return Container(
      margin: EdgeInsets.only(bottom: 10),
      width: MediaQuery.of(context).size.width,
      height: 90,
      decoration: BoxDecoration(
        borderRadius: BorderRadius.all(Radius.circular(20)),
        color: docContentBgColor,
      ),
      child: Container(
        padding: EdgeInsets.all(10),
        child: Row(
          children: <Widget>[
            Container(
              width: 70,
              decoration: BoxDecoration(
                borderRadius: BorderRadius.all(Radius.circular(10)),
                color: dateBgColor,
              ),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: <Widget>[
                  Text(
                    "$date",
                    style: TextStyle(
                      color: dateColor,
                      fontSize: 30,
                      fontWeight: FontWeight.w800,
                    ),
                  ),
                  Text(
                    "$month",
                    style: TextStyle(
                      color: dateColor,
                      fontWeight: FontWeight.w800,
                      fontSize: 20,
                    ),
                  ),
                ],
              ),
            ),
            SizedBox(
              width: 10,
            ),
            Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: <Widget>[
                Text(
                  "$slotType",
                  style: TextStyle(
                    color: dateColor,
                    fontSize: 20,
                    fontWeight: FontWeight.w400,
                  ),
                ),
              ],
            )
          ],
        ),
      ),
    );
  }
}
