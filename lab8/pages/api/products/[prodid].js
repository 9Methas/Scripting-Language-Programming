import { query } from "../../../lib/db";
import { checkapiKey } from "../../../lib/auth";

export default async function handler(req, res) {
    if (req.method === "GET") {
        const {apikey} = req.headers;
        const {prodid} = req.query;
        console.log(req.query)
        if(checkapiKey(apikey)){
            const results = await query("SELECT * FROM products WHERE id=?",prodid);
            res.status(results.status.code).json(results);
        }else{
            res.status(401).json({status: {code: 401, message:'Unauthorized'}})
        }
    }else if(req.method === "PUT"){
        const {apikey} = req.headers;
        if(checkapiKey(apikey)){
            const {prodid} = req.query;
            const {title, price, description, image, category} = req.body
            const results = await query("UPDATE products SET title=?, price=?, description=?, image=?, category=? WHERE id=?", [title, price, description, image, category, prodid]);
            res.status(204).json(results);
        }else{
            res.status(401).json({status: {code: 401, message:'Unauthorized'}})
        }
    }else if(req.method === "DELETE"){
        const {apikey} = req.headers;
        if(checkapiKey(apikey)){
            const {prodid} = req.query;
            const {title, price, description, image, category} = req.body
            const results = await query("DELETE FROM products WHERE id=?", [prodid]);
            //console.log(results);
            res.status(204).json(results);
        }else{
            res.status(401).json({status: {code: 401, message:'Unauthorized'}})
        }
    }
}