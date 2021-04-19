import axios from "axios";
import { Select, Button } from 'antd';
import { useState, useEffect } from "react";

const { Option } = Select;

function Home(){

    const URL = "https://covid-api.mmediagroup.fr/v1/cases";
    const [countrys, setCountrys] = useState([]);
    const [country, setCountry] = useState("");
    const [loading, setLoading] = useState(true);

    async function getCountrys(){
        const res = await axios.get(URL);

        setCountrys(Object.keys(res.data));
        setLoading(false);
    }


    useEffect(() => {
        getCountrys();
        
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [])

    return(
        <>
            <Select
                loading={loading}
                showSearch
                style={{ width: 300 }}
                placeholder="Selecione o pais"
                optionFilterProp="children"
                onChange={e => setCountry(e)}
                filterOption={(input, option) =>
                option.children.toLowerCase().indexOf(input.toLowerCase()) >= 0
                }
            >
                {countrys.map((item, index) => {
                    return (
                        <Option value={item} key={index}>{item}</Option>
                    );
                })}
            </Select>

            
            <Button type="primary" href={"/"+country}>
                Buscar
            </Button>
            
           
            
        </>
    );
}

export default Home;