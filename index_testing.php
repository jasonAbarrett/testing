
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--  Author:  Jason Barrett
          Date:    June 2020
    -->
    <title>Read Data</title>
    <meta charset="UTF-8"  />
    <meta name="description" content="Non-profit service that allows individual local artists and crafts persons around the world to be able to market their products directly to a global audience." />
    <link href="./styleSheets/styles.css"
          rel="stylesheet"
          type="text/css"  />
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto Condensed" rel="stylesheet">


  </head>

  <body>
    <a class="skipLink" href="#mainContent">Skip to Main Content</a>

    <header>
    <?php include 'htmlheader_index.php';?>
    </header>

  <main id="mainContent">
    <section>
      
      <br /><br />
      <article>
        <h3>Enter search criteria below</h3>
        <p></p>
      </article>
  
      <article>
        <h3 hidden>Form</h3>
        <!-- <form name="form01" action="http://itins3.madisoncollege.edu/echo.php" method="post" onSubmit="return checkAll();" onreset="return clearAll();">
        --> 
        
        <form name="form01" action="read_test2.php" method="post" onreset="return clearAll();">
         
        


        <span class="selectBox">Select institution:</span>
            <select name="institution" required>
              <option value="">select an institution</option>
              <option value="1">Northern State University</option>
              <option value="2">Southern State University</option>
              <option value="3">Eastern State University</option>
              <option value="4">Western State University</option>
              <option value="5">State University System Admin</option>
          </select><br/>


          <br />
        
  
        <span class="selectBox">Select functional area (optional):</span>
            <select name="category">
              <option value="">select a functional area</option>
              <option value="1">Personnel</option>
              <option value="2">Libraries, Archives, and Museums</option>
              <option value="3">Administration</option>
              <option value="4">Police</option>
              <option value="5">Athletics</option>
              <option value="6">Student Services</option>
              <option value="7">Risk Management</option>
              <option value="8">Grants</option>
              <option value="9">Health Services</option>
              <option value="10">Fiscal and Accounting</option>
              <option value="11">Residential Programs</option>
            </select><br/>



          <br />
  
          <label for="keyword" class="blocktext">Enter keywords (optional): </label>
          <input type="text"
                 name="keyword"
                 id="keyword"
                 placeholder="keyword"
                 maxlength="100"
                 />
                 <span id="LNerror"></span>
    
  
          <br />

          <br />
  





      <div id="centerbuttons">
        <input type="submit" value="Submit" id="submit-button"/>
        &nbsp;&nbsp;
        <input type="reset"  value="Clear" name="clrfrm" id="clear-form"/>
      </div>
      
    </form>
  
  
    </article>
      
      
      
    <br />
    <br />
               
        </section>
      </main>

    <footer id="footer">
    <div id="admin">
      <a href="add-test.php" id="admin1">Admin Page</a>
     </div> 
      
      <address>
        <p></p>
      </address>
    </footer>


  </body>
</html>
