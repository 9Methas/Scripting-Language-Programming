const APIKEY = "3d7d052a031e864ee9c1b04b5a4d0f11";
export function checkapiKey(apikey) {
    if(apikey === APIKEY){
        return true;
    } else{
        return false;
    }
} 