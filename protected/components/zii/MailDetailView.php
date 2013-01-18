<?php

class MailDetailView extends DetailView
{
    public $itemTemplate="<tr class=\"{class}\"><td><b>{label}: </b></td><td>{value}</td></tr>\n";
    public $nullDisplay='';
}
