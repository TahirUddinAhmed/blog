 <!-- Search Section-->
 <header class="py-5 bg-dark border-bottom mb-4">
     <div class="container">
         <!-- Search widget-->
         <div class="card mb-2">
             <div class="card-header">Search</div>
             <form action="posts/search">
                 <div class="card-body">
                     <div class="input-group">
                         <input 
                            class="form-control" 
                            type="text" 
                            placeholder="Enter search term..." 
                            name="title"
                            aria-label="Enter search term..." 
                            aria-describedby="button-search" 
                        />
                         <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </header>