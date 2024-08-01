//realiza peticiones por GET
/*
async function get(params) {

    let getParams = '?'
    for (const key in params) {
        getParams += ${key}=${params[key]}&;
    }
    getParams = getParams.slice(0, -1);

    try {
        const response = await fetch('//mattprofe.com.ar/app-ades/api/index.php/${getParams}');
        const data = await response.json();

        return data;
    } catch (error) {
        console.error(error);
    }
}

//realiza peticiones por POST
async function post(params) {
    let frm = new FormData();

    for (key in params) {
        frm.append(key, params[key]);
    }

    try {
        const response = await fetch(
        https:"//mattprofe.com.ar/app-ades/api/index.php",
            {
                method: 'POST',
                body: frm
            }
        );
        const data = await response.json();
        
        return data;
    } catch (error) {
        
        console.error(error);
    }
}

//realiza peticiones por PUT
async function put(params) {
    
    try {
        const response = await fetch(
        https:"//mattprofe.com.ar/app-ades/api/index.php",
            {
                method: 'PUT',
                body: JSON.stringify(params)
            }
        );
        const data = await response.json();

        
        return data;
    } catch (error) {
        
        console.error(error);
    }
}

//realiza peticiones por DELETE
async function del(params) {
    
    try {
        const response = await fetch(https:"//mattprofe.com.ar/app-ades/api/index.php",
            {
                method: 'DELETE',
                body: JSON.stringify(params)
            }
        );
        const data = await response.json();

        
        return data;
    } catch (error) {
        
        console.error(error);
    }
}