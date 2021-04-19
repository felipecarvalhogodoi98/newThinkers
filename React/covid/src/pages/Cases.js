import { useParams } from "react-router-dom";
import axios from "axios";
import { useState, useEffect } from "react";
import { Menu, Alert, PageHeader, Button } from "antd";
import { LeftOutlined } from "@ant-design/icons"; 

function Cases(){

    const URL = "https://covid-api.mmediagroup.fr/v1/cases";
    const params = useParams();
    const [estates, setEstates] = useState([]);
    const [isMounted, setIsMounted] = useState(false);
    const { SubMenu } = Menu;

    const getDATA = (date) =>{
        date = Date(date);
        return date.toString();
    }

    const getEstates = async () =>{
        const res = await axios.get(URL+"?country="+params.country);
        setEstates(res.data);
        setIsMounted(true);
    }
   

    function handleClick(e) {
        console.log('click ', e);
    }

    useEffect(() => {
        getEstates();
        console.log(estates); 
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [])

    return (
        <>
            <Button type="dashed" href="/"><LeftOutlined /></Button>
            <PageHeader title={"Covid 19 no "+params.country}/>
            <Button type="primary" href={`/${params.country}`}>Casos</Button>
            <Button href={`/${params.country}/vacinas`}>Vacinas</Button>
            {isMounted === false ? 
                <Alert message="Carregando..." type="warning" /> :
                <div>    
                <Menu
                    onClick={handleClick}
                    style={{ width: 400 }}
                    defaultSelectedKeys={["1"]}
                    defaultOpenKeys={['All']}
                    mode="inline"
                >
                    <SubMenu key="All" title={estates["All"]["country"]}>
                        <Menu.Item key="1">Confirmados: {estates["All"]["confirmed"]}</Menu.Item>
                        <Menu.Item key="2">Recuperados: {estates["All"]["recovered"]}</Menu.Item>
                        <Menu.Item key="3">Mortes: {estates["All"]["deaths"]}</Menu.Item>
                        <Menu.Item key="4">Expectativa de vida: {parseInt(estates["All"]["life_expectancy"])}%</Menu.Item>
                    </SubMenu>
                    {Object.keys(estates).map((item, index) => {
                        if(item === "All") return ("");
                    return(
                        
                        <SubMenu key={index} title={item}>
                            <Menu.Item key={item+"c"}>Confirmados: {estates[item]["confirmed"]}</Menu.Item>
                            <Menu.Item key={item+"r"}>Recuperados: {estates[item]["recovered"]}</Menu.Item>
                            <Menu.Item key={item+"d"}>Mortes: {estates[item]["deaths"]}</Menu.Item>
                            <Menu.Item key={item+"u"}>Atualizado em: {getDATA(estates[item]["updated"])}</Menu.Item>
                        </SubMenu>
                    );
                    })}
                </Menu>
                </div>
                }
               
        </>
    );
}

export default Cases;