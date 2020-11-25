<!---------FOOTER----------->
        <div class = "footer">
            <div class="container">
                <hr>
                <a style ="margin-left:20px"> Fall 2020 ISDS 454 <br> Group3</a> 
                </div>
            </div>
        </div>
<!---js for toggle menu--->
    <script>
        var MenuItems = document.getElementByID("MenuItems");
        
        MenuItems.style.maxHeight = "0px";
        
        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
                {
                    MenuItems.style.maxHeight = "200px";
                }
            else
                {
                    MenuItems.style.maxHeight = "0px";
                }
        }
    </script>
    
</body>
</html>