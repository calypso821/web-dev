<!DOCTYPE html>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<title>Web project</title>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <div id="app" class="row">
        <div class="row  justify-content-center align-items-center">
            <div class="d-grid gap-1 col-12 mb-2 px-4 d-md-none">
            <a class="btn btn-dark mt-3"  href="<?= BASE_URL . "project/allProjects" ?>"><button class="btn btn-dark">All</button></a>
            <a class="btn btn-dark" href="<?= BASE_URL . "project/allProjects?category=WebDev" ?>"><button class="btn btn-dark ">Web development</button></a>
            <a class="btn btn-dark" href="<?= BASE_URL . "project/allProjects?category=MobileApp" ?>"><button class="btn btn-dark">Mobile app</button></a>
            <a class="btn btn-dark" href="<?= BASE_URL . "project/allProjects?category=Hardware" ?>"><button class="btn btn-dark">Hardware</button></a>
            <a class="btn btn-dark" href="<?= BASE_URL . "project/allProjects?category=GameDev" ?>"><button class="btn btn-dark">Game development</button></a>
            <a class="btn btn-dark" href="<?= BASE_URL . "project/allProjects?category=DataMining" ?>"><button class="btn btn-dark">Data Mining</button></a>
            <a class="btn btn-dark mb-3" href="<?= BASE_URL . "project/allProjects?category=Other" ?>"><button class="btn btn-dark">Other</button></a>
            </div>
        </div>
        <div class="row justify-content-center align-items-center mt-4 mb-4">
            <div class="col-6 col-sm-5 col-md-3">
                <form class="form-inline">
                    <input id="search-field" class="form-control form-control-sm ml-3" 
                        type="text" name="query" autocomplete="off" v-on:keyup="search" placeholder="Search" aria-label="Search" autofocus>
                </form>
            </div>
            <div class="col-2 col-sm-2 col-md-1">
                <div class="dropdown">
                    
                    <a class="btn btn-secondary dropdown-toggle" href="" role="button" 
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Order</a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a v-on:click="order('votes', 'asc')" class="dropdown-item" href="#">By rating (Highest)</a></li>
                        <li><a v-on:click="order('votes', 'des')" class="dropdown-item" href="#">By rating (Lowest)</a></li>
                        <li><a v-on:click="order('date', 'asc')" class="dropdown-item" href="#">By date (Latest)</a></li>
                        <li><a v-on:click="order('date', 'des')" class="dropdown-item" href="#">By date (Oldest)</a></li>
                        <li><a v-on:click="order('name', 'asc')" class="dropdown-item" href="#">By name (A-Z)</a></li>
                        <li><a v-on:click="order('name', 'des')" class="dropdown-item" href="#">By name (Z-A)</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="d-grid gap-2 col-md-3 mb-2 px-4  d-none d-md-block py-3">
                <?php include("view/navigation/category-links.php"); ?>
            </div>
            <div class="col-9 col-sm-5 col-md-4">
                <div class="card mb-4" v-for="project in projects">
                    <a :href="'<?= BASE_URL . "project?id=" ?>' + project.id">
                    <img class="card-img-top" :src="'<?= IMAGES_URL . "project2/" ?>' + project.image_name" alt="project picture"></a>
                    <div class="card-body">
                        <a class="card-title text-decoration-none" :href="'<?= BASE_URL . "project?id=" ?>' + project.id"><h5><b>{{ project.title }}</b></h5></a>
                        <span class="card-text"><b>Author: </b> {{ project.author }}</span><br>
                        <p class="card-text"><b>Category:</b> {{ project.category }}</p>
                        <p class="card-text">
                        <div>
                            <?php if($loggedIn): ?>
                                <button class="btn btn-sm" 
                                    :style="{ borderColor: project.voted == 1 ? '#4CAF50' : '#E0E0E0',
                                              color: project.voted == 1 ? '#4CAF50' : 'black'}" 
                                    id="upvote" v-on:click="vote('upvote', project.id); colorButton($event);">Like</button>
                                <button class="btn btn-sm" 
                                    :style="{ borderColor: project.voted == -1 ? 'red' : '#E0E0E0',
                                             color: project.voted == -1 ? 'red' : 'black'}" 
                                    id="downvote" v-on:click="vote('downvote', project.id); colorButton($event);">Dislike</button>
                                <span></span>
                            <?php endif; ?>
                            <span class="h6 px-2" :style="{ color: project.votes >= 0 ? project.votes > 0 ? 'green' : '' : 'red' }">
                                {{ project.votes }}</span>
                        </div>
                    </div>
                    <div class="card-footer text-muted">Updated  {{ project.time_passed }} days ago</div>
                </div>
            </div>
            <div class="col-9 col-sm-5 col-md-4">
            <div class="card mb-4" v-for="project in projects2">
                    <a :href="'<?= BASE_URL . "project?id=" ?>' + project.id">
                        <img class="card-img-top" :src="'<?= IMAGES_URL . "project2/" ?>' + project.image_name" alt="project picture"></a>
                        <div class="card-body">
                            <a class="card-title text-decoration-none" :href="'<?= BASE_URL . "project?id=" ?>' + project.id"><h5><b>{{ project.title }}</b></h5></a>
                            <span class="card-text"><b>Author: </b> {{ project.author }}</span><br>
                            <p class="card-text"><b>Category:</b> {{ project.category }}</p>
                            <p class="card-text">
                            <div>
                                <?php if($loggedIn): ?>
                                    <button class="btn btn-sm" 
                                        :style="{ borderColor: project.voted == 1 ? '#4CAF50' : '#E0E0E0',
                                                color: project.voted == 1 ? '#4CAF50' : 'black'}" 
                                        id="upvote" v-on:click="vote('upvote', project.id); colorButton($event);">Like</button>
                                    <button class="btn btn-sm" 
                                        :style="{ borderColor: project.voted == -1 ? 'red' : '#E0E0E0',
                                                color: project.voted == -1 ? 'red' : 'black'}" 
                                        id="downvote" v-on:click="vote('downvote', project.id); colorButton($event);">Dislike</button>
                                    <span></span>
                                <?php endif; ?>
                                <span class="h6 px-2" :style="{ color: project.votes >= 0 ? project.votes > 0 ? 'green' : '' : 'red' }">
                                {{ project.votes }}</span>
                            </div>
                        </div>
                    <div class="card-footer text-muted">Updated  {{ project.time_passed }} days ago</div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include("view/navigation/footer.php"); ?>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://unpkg.com/vue@2.6.9"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

const app = new Vue({
    el: '#app',     // Vue app will live in the context of the #app element
    data: {    // contains vue App data
        projects: searchGet(""),
        projects2: searchGet("") // intitially the list of projects
    },
    methods: {
        search(event) { // method to be invoked on ever keyup event
            const query = event.target.value
            if (query == "")
                searchGet("");
            
            else {
                searchGet(query);
            }
        },
        order(type, order) {
            orderList(type, order);
        },
        vote(type, proj_id) {
            vote(type, proj_id);
        },
        colorButton(event) {
            console.log(event.target.id);
            upvote = event.target.parentElement.children[0];
            downvote = event.target.parentElement.children[1];
            if(event.target.id == "upvote"){
                upvote.style.borderColor = "#4CAF50";
                upvote.style.color = "#4CAF50";
                downvote.style.borderColor = "#E0E0E0";
                downvote.style.color = "black";
            }
            else{
                downvote.style.borderColor = "red";
                downvote.style.color = "red";
                upvote.style.borderColor = "#E0E0E0";
                upvote.style.color = "black";
            }
        },
        colorUp(proj){
            // check if user upvoted
            return true;
        },
        colorDown(proj){

            return true;
        }
        
    },
    mounted() {
    }
});

// get all project if query == ""
function searchGet(query) {
    axios.get("<?= BASE_URL . "api/project/search/" ?>",
            { params: { query: query } })
        .then(response => (app.projects = filterList(response.data, "<?= $category ?>", 0), 
                        app.projects2 = filterList(response.data, "<?= $category ?>", 1)))
        .catch(error => console.log(error));
}  
function vote(type, proj_id){
    axios.post("<?= BASE_URL . "api/project/vote/" ?>", 
        JSON.stringify({ type: type, project_id: proj_id }))
        .then(response => updateVotes(response.data))
        .catch(error => console.log(error))
        
}
function updateVotes(project) {
    const data1 = JSON.parse(JSON.stringify(app.projects));
    const data2 = JSON.parse(JSON.stringify(app.projects2));
    project_index = data1.findIndex((obj => obj.id == project["id"]));
    if(project_index == -1){
        project_index = data2.findIndex((obj => obj.id == project["id"]));
        data2[project_index].votes = project["votes"];
        app.projects2 = data2;
    }
    else{
        data1[project_index].votes = project["votes"];
        app.projects = data1;
    }
}

function filterList(data1, category, col) {
    hits = data1["hits"];
    votes = data1["votes"];

    current = new Date();
    for (let i = 0; i < hits.length; i++) {
        tp = current - new Date(hits[i].date);
        days = tp/(1000*60*60*24);
        hits[i].time_passed = Math.round(days);

        if(votes == 0 || votes[i] == false){
            hits[i].voted = 0;
        }
        else{
            hits[i].voted = votes[i].value;
        }
    }

    if(category == "all"){
        data1 = hits.filter((_, i) => i % 2 === col);
        return data1;
    }
    const data = JSON.parse(JSON.stringify(hits));
    let newArray = data.filter(function (proj){
        return proj.category == category;
    });
    newArray = newArray.filter((_, i) => i % 2 === col);
    return newArray;
}


function orderList(type, order) {
    const data1 = JSON.parse(JSON.stringify(app.projects));
    const data2 = JSON.parse(JSON.stringify(app.projects2));
    const data = data1.concat(data2);
    if(type == "date") { // sort by date 
        if(order == 'asc') {
            data.sort((a, b) => (a.date < b.date) ? 1: (a.date > b.date) ? -1: 0)
        }
        else if(order == 'des') {
            data.sort((b, a) => (a.date < b.date) ? 1: (a.date > b.date) ? -1: 0)
        }
    }
    else if(type == "name"){ // sort by name
        if(order == 'asc') {
            data.sort(function(a, b) {
                var textA = a.title.toUpperCase();
                var textB = b.title.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
            });
        }
        else if(order == 'des') {
            data.sort(function(b, a) {
                var textA = a.title.toUpperCase();
                var textB = b.title.toUpperCase();
                return (textA < textB) ? -1 : (textA > textB) ? 1 : 0;
            });
        }
    } 
    else if(type == "votes") { // sort by votes
        if(order == 'asc') {
            data.sort((a, b) => (a.votes < b.votes) ? 1: (a.votes > b.votes) ? -1: 0)
        }
        else if(order == 'des') {
            data.sort((b, a) => (a.votes < b.votes) ? 1: (a.votes > b.votes) ? -1: 0)
        }
    }
    app.projects = data.filter((_, i) => i % 2 === 0);
    app.projects2 = data.filter((_, i) => i % 2 === 1);
}
</script>