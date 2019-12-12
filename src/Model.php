<?php


namespace Rentit;


interface Model
{
    // function to access DB
    public function getDB();
    //function to obtain DAO single results
    public function getSingleResult();
    //function to obtain DAO results
    public function getResults();
}