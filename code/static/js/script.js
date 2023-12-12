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