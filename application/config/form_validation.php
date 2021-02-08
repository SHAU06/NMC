<?php
$config =[

  'add_rules' =>  [
                                                [    
                                                   'field'=>'username',
                                                   'label'=>'UserName',
                                                   'rules'=>'required|alpha_numeric|max_length[8]|min_length[4]|trim'
                                                ],
                                                [
                                                   'field'=>'password',
                                                   'label'=>'password',
                                                   'rules'=>'required|alpha_numeric|max_length[8]|min_length[4]|trim'
                                                ], 
                                        
                        
]




];
?>