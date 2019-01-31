<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Conversations extends Controller
{
    /*
        1. Find current user id.
        2. Get all 'messages' involving the current user, from them only include one 'other person' once.

    (next controller - it will take the current id, and the other person's id)
        1. Get all messages between the current user and the other person's id (this is the query we did)
        2. List all those messages, with the if statement to differentiate between 'my'
                 messages and the other person's messages
     */

}
