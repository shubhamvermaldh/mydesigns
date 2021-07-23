<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    .grid-960{
    }

    .row{
       background: #eee;
    }

    .wrap-1{
        /*display: table;
        min-height: 100%;*/
    }

    .wrap-2{
        /*display: table-row;*/
    }

    .col{
        vertical-align: middle;
        width: 49%;
        display: inline-block;   
    }
  </style>
</head>
<body>
  <div class="grid-960">
      <div class="row content">
          <div class="wrap-1">
              <div class="wrap-2">
                <div class="col col-6-12">
                  <img src="imgs/image.jpg" alt="img"/>
                </div>
                <div class="col col-6-12 last">
                  <h2>Title1</h2>
                  <p>My content</p>
                  <p>My content</p>
                  <p>My content</p>
                  <p>My content</p>
                </div>
              </div>
          </div>     
      </div>
  </div>
</body>
</html>