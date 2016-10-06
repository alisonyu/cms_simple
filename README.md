##内容管理系统

###运行环境
该系统可以在PHP 5.3.29+mysql5.08下运行

###初始化配置说明
在运行前要先设置**/model/connectdb.php**里面的**connectdb()**,**connect()**有关MySQL的相关信息，之后设置**initialize_db.php**的**$db_name**，注意要与在connectdb()的$db_name要**一致**。

###基本功能说明
完成配置可以打开indextest.php（在完成以上的配置工作后就可以重命名为index.php作为主页），login里面默认的用户名和密码是admin，登陆后可以添加文章以及登出。默认的分页是10篇文章一页，分页的文章数可以在../view/pagecontroller.php的diffpage()里设置$shownum来改变。


###各个文件的简要说明
#####根文件  
　　Indextest.php              用于主页，完成配置后重命名为index.php  
　　Initialize_db.php          初始化数据库，进行建库建表的操作  
#####Controler  
　　addcontroler.php           定义添加的文章的相关函数  
　　textcontroler.php          处理添加文章的相关格式，并处理添加文章的操作  
　　Commentcontroler.php       处理评论的相关操作  
　　logincontroller.php        处理登陆的相关操作     
#####model  
　　comment.php                处理评论的数据  
　　connectdb.php           定义连接数据库的以及与数据库相关的函数  
　　Loginexam.php	       验证登陆信息  
#####View  
　　pagecontroler.php 	       显示（主）页面，定义分页的相关函数  
　　Caogao.php                 显示文章详情  
　　Header.php		       显示每个页面上面的标题  
　　Loginpage.html	       登陆页面  
　　Commentboard.html	       评论版  
　　Addarticle.html	       添加文章页面  
　　Exitlogin.html             退出登陆   
　　 