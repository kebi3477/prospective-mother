<?php

include "../dbcon.php";

    $sql = "CREATE TABLE IF NOT EXISTS signup(
    num int auto_increment,
    id varchar(20) NOT NULL,
    pw varchar(30) NOT NULL,
    name varchar(20) NOT NULL,
    nickname varchar(20) NOT NULL,
    address varchar(100) NOT NULL,
    tel varchar(12) NOT NULL,
    email varchar(50) NOT NULL,
    PRIMARY KEY(num,id,nickname)) DEFAULT CHARSET=UTF8";
    
    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }


    $sql = "CREATE TABLE IF NOT EXISTS parenting_board(
    num int auto_increment,
    type varchar(10) NOT NULL,
    title varchar(50) NOT NULL,
    name varchar(15) NOT NULL,
    img_src varchar(255),
    movie_src varchar(255),
    content text NOT NULL,
    date varchar(15) NOT NULL,
    hit int(3) DEFAULT 0,
    good int(3) DEFAULT 0,
    PRIMARY KEY(num)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }



    $sql = "CREATE TABLE IF NOT EXISTS pregnant_board(
    num int auto_increment,
    type varchar(10) NOT NULL,
    title varchar(50) NOT NULL,
    name varchar(15) NOT NULL,
    img_src varchar(255),
    movie_src varchar(255),
    content text NOT NULL,
    date varchar(15) NOT NULL,
    hit int(3) DEFAULT 0,
    good int(3) DEFAULT 0,
    PRIMARY KEY(num)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }

    $sql = "CREATE TABLE IF NOT EXISTS dad_board(
    num int auto_increment,
    type varchar(10) NOT NULL,
    title varchar(50) NOT NULL,
    name varchar(15) NOT NULL,
    img_src varchar(255),
    movie_src varchar(255),
    content text NOT NULL,
    date varchar(15) NOT NULL,
    hit int(3) DEFAULT 0,
    good int(3) DEFAULT 0,
    PRIMARY KEY(num)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }


    $sql = "CREATE TABLE IF NOT EXISTS board_like(
    num int auto_increment,
    nickname varchar(20) NOT NULL,
    board_num int(5) NOT NULL,
    PRIMARY KEY(num)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }

    $sql = "CREATE TABLE IF NOT EXISTS reply(
    id int auto_increment,
    board_num int(5) NOT NULL,
    content text NOT NULL,
    nickname varchar(20) NOT NULL,
    date varchar(20) NOT NULL,
    PRIMARY KEY(id)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }

    $sql = "CREATE TABLE IF NOT EXISTS preg_reply(
    id int auto_increment,
    board_num int(5) NOT NULL,
    content text NOT NULL,
    nickname varchar(20) NOT NULL,
    date varchar(20) NOT NULL,
    PRIMARY KEY(id)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{   
    echo "생성실패";
    }

    $sql = "CREATE TABLE IF NOT EXISTS dad_reply(
    id int auto_increment,
    board_num int(5) NOT NULL,
    content text NOT NULL,
    nickname varchar(20) NOT NULL,
    date varchar(20) NOT NULL,
    PRIMARY KEY(id)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }

    $sql = "CREATE TABLE IF NOT EXISTS report(
    id int auto_increment,
    board_num int(5) NOT NULL,
    nickname varchar(30) NOT NULL,
    type varchar(15) NOT NULL,
    box varchar(50) NOT NULL,
    report_text text(20) NOT NULL,
    PRIMARY KEY(id)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }

    $sql = "CREATE TABLE IF NOT EXISTS free_share(
    num int auto_increment,
    title varchar(50) NOT NULL,
    name varchar(15) NOT NULL,
    img_src varchar(255),
    address varchar(255),
    product varchar(50),
    content text NOT NULL,
    warning text,
    date varchar(15) NOT NULL,
    hit int(3) DEFAULT 0,
    good int(3) DEFAULT 0,
    PRIMARY KEY(num)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }

    $sql = "CREATE TABLE IF NOT EXISTS free_like(
    num int auto_increment,
    nickname varchar(20) NOT NULL,
    board_num int(5) NOT NULL,
    PRIMARY KEY(num)) DEFAULT CHARSET=UTF8";

    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }

    

    $sql = "CREATE TABLE IF NOT EXISTS free_reply(
    id int auto_increment,
    board_num int(5) NOT NULL,
    content text NOT NULL,
    nickname varchar(20) NOT NULL,
    date varchar(20) NOT NULL,
    PRIMARY KEY(id)) DEFAULT CHARSET=UTF8";
    
    $result = $mysqli->query($sql);
    if($result){
        echo "생성완료";
    }
    else{
        echo "생성실패";
    }

    

    ?>