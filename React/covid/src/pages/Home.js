import axios from "axios";
import { Select, Button } from 'antd';
import { useState, useEffect } from "react";


function Home(){

    const URL = "https://covid-api.mmediagroup.fr/v1/cases";
    const [countrys, setCountrys] = useState([]);
    const { Option } = Select;
    const [country, setCountry] = useState("");

    async function getCountrys(){
        const res = await axios.get(URL);

        setCountrys(Object.keys(res.data));
    }

    function onBlur() {
        console.log('blur');
    }

    function onFocus() {
        console.log('focus');
    }

    function onSearch(val) {
        console.log('search:', val);
    }

    useEffect(() => {
        getCountrys();
        
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [])

    return(
        <>
            <Select
                showSearch
                style={{ width: 300 }}
                placeholder="Selecione o pais"
                optionFilterProp="children"
                onChange={e => setCountry(e)}
                onFocus={onFocus}
                onBlur={onBlur}
                onSearch={onSearch}
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