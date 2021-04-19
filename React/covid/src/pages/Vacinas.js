import { useParams } from "react-router-dom";
import axios from "axios";
import { useState, useEffect } from "react";
import { Menu, Alert, PageHeader, Button } from "antd";
import { LeftOutlined } from "@ant-design/icons"; 
function Vacinas(){
    const URL = "https://covid-api.mmediagroup.fr/v1/vaccines";
    const params = useParams();
    const [info, setInfo] = useState([]);
    const [isMounted, setIsMounted] = useState(false);
    const { SubMenu } = Menu;

    const getInfo = async () =>{
        const res = await axios.get(URL+"?country="+params.country);
        setInfo(res.data);
        setIsMounted(true);
    }

    function handleClick(e) {
        console.log('click ', e);
    }

    useEffect(() => {
        getInfo();
        console.log(info);
    }, [])

    return (
        <>
            <Button type="dashed" href="/"><LeftOutlined /></Button>
            <PageHeader title={"Covid 19 no "+params.country}/>
            <Button href={`/${params.country}`}>Casos</Button>
            <Button type="primary" href={`/${params.country}/vacinas`}>Vacinas</Button>
            {isMounted === false ? 
                <Alert message="Carregando..." type="warning" /> :
                <div>    
                <Menu
                    onClick={handleClick}
                    style={{ width: 400 }}
                    defaultSelectedKeys={["1"]}
                    defaultOpenKeys={['country']}
                    mode="inline"
                >
                    <SubMenu key="country" title={info["All"]['country']}>
                        <Menu.Item key="1">População: {info["All"]["population"]}</Menu.Item>
                        <Menu.Item key="2">Pessoas vacinadas: {info["All"]["people_vaccinated"]}</Menu.Item>
                        <Menu.Item key="3">Pessoas parcialmente vacinadas: {info["All"]["people_partially_vaccinated"]}</Menu.Item>
                    </SubMenu>
                </Menu>
                </div>
                }
        </>
    );
}

export default Vacinas;