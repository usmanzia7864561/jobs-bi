# jobs-bi

## Predispositions:
- Before you start, create a git repository, and send link on it to tomas.wittenberger@bistudio.com. 
  - We want to see how you’re progressing with the task.

- Provide the API in Postman.
- Use Laravel
- It’s mandatory to have unit test in a code.

### Business Requirements:
We are looking for all the requirements to be submitted. This is your chance to impress us, so feel free to add
additional functionality or design. But what is written below is a must.
- Create an API with public endpoints that will support the following points:
  - X Create a simple login/register page for the user
    - Use form validation for registration form
  - X Registration form must contain:
    -  Name
    -  Surname
    -  Nickname
    -  Phone
    -  Email
    -  Address
    -  City
    -  State
    -  ZIP
  - X Generate the Username from full surname and 3 letter from first name
    - Example: Johnny Depp will have username “deppjoh”
  - X  Logged user can add new comment
      - Maximum length for comment is 255 characters
      - ! Provide login and password for example user
  - X Logged user which is Moderator can create a blogposts
      - X Maximum length for subject on the new blog post is 64 characters
      - ! Provide login and password for example user
  -  Logged user which is Administrator can delete post or comment.
      - ! Provide login and password for example user
  - X Blog feed should list all posts and associated title, author, date, description, and total comments.
    - It should be sorted by overall number of comments.
  - X Users can view individual blog posts in a separate page
  - X Users can view comments for a blog post
  - X When deleting the comment or blog post it should be soft-deleted and moved to the trash bin from
  which can be deleted permanently.
     - X The comment or blog post older than 3 hours should be deleted automatically and put into
  trash bin.
     - Admin can restore comment or blog post
Use Migration and Seed to create database and record. Database should contain at least 50k users, 1000
blogposts and every blogpost have at least 50 comments.

## Solving

I used for solving laravel documentation, laracast pages, stackoverflow or google.

### Provided users

#### Admin

``

#### Moderator
#### User


### Docker

Docker for laravel by https://hub.docker.com/r/bitnami/laravel/
