import { query } from "../../../lib/db";
import { checkapiKey } from "../../../lib/auth";

export default async function handler(req, res) {
    if (req.method === "GET") {
        const {apikey} = req.headers;
        if(checkapiKey(apikey)){
            const results = await query("SELECT * FROM products");
            res.status(results.status.code).json(results);
        }else{
            res.status(401).json({status: {code: 401, message:'Unauthorized'}})
        }
    }else if(req.method === "POST"){
        const {apikey} = req.headers;
        if(checkapiKey(apikey)){
            const {title, price, description, image, category} = req.body
            const results = await query("INSERT INTO products (title, price, description, image, category) VALUES(?,?,?,?,?)", [title, price, description, image, category]);
            res.status(204).json(results);
        }else{
            res.status(401).json({status: {code: 401, message:'Unauthorized'}})
        }
    }
}