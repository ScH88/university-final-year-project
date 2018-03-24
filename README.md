This here is the website I have made for my final year project at university, which had been on their server for a few years before finally being taken offline. You could say it is the first website I have done.

Prior to uploading here on GitHub, I only added SASS functionality and Bootstrap row/column design to replace the outdated Mootools.js which I had used back then. I left here because I feel I have other, more pressing things to do than spend time improving on an old piece of work, so if this code is still crude and untidy, feel free to criticise.

--- HOW THIS SITE WORKS ---

To non-members, the website has a list of hunts, where members can view clues. After reading the clue, the user can find a QR code printout leading to the next clue. If the user is a logged-on member, he/she can keep track of which clues have been discovered.

There is also a GPS page, which utilises the Google Maps API. If the user is logged in, markers for each hunt clue's general area are marked on the map. The map is supposed to zoom in on the user's current location, but I do not know if this still works (despite me remembering it working back when I tested the site). 

There is also a user forum, where non-members can read threads about a range of topics, but cannot participate. Logged-on members can post replies, and even delete their own.

The website has a "sign up" page, which gives users the option to become a member, which lets them participate in forum threads, keep track of hunt progress and post private messages (this will be explained later). The user can log in using these details and access their profile, which creates a session storing the user's ID, username, avatar e.t.c. (Please note that I forgot to add code to ensure the file input for the user's avatar only accepts image files).

In the user main profile page, the user can read a list of updates/messages, post a private message, create a forum thread and, if the member is an Admin, create a new hunt. It seems that throughout all the time I spent on this project, I forgot to allow the user to delete their own profile in the same way, for example, Facebook allows their users to delete their profiles.

Now regarding how hunts are created, the admin fills a form and submits. The resulting action sends a private message to each admin containing urls to each clue that the admin has entered. At the time, I used online, third party websites to convert the urls into printed QR codes.


And that concludes my explanation of my final year project (aka my first website). It serves as nothing more than a throwback, as I would go on to create better, cleaner websites.
