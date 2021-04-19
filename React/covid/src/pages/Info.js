import { useParams } from "react-router-dom";
import axios from "axios";
import { useState, useEffect } from "react";
import { Tabs, PageHeader, Collapse, Spin } from "antd";

const { TabPane } = Tabs;
const { Panel } = Collapse;

function Info(){

    const URL = "https://covid-api.mmediagroup.fr/v1";
    const params = useParams();
    const [cases, setCases] = useState([]);
    const [vaccines, setVaccines] = useState([]);
    const [loading, setLoading] = useState(true);

    async function getCases(){
        
        const res = await axios.get(`${URL}/cases?country=${params.country}`);
        if(res.status === 200){
            setCases(res.data);
        }
    }

    async function getVaccines(){
        const res = await axios.get(`${URL}/vaccines?country=${params.country}`);
        if(res.status === 200){
            setVaccines(res.data);
            setLoading(false);
        }
        
    }
    

    useEffect(() => {
        getCases();
        // eslint-disable-next-line react-hooks/exhaustive-deps
        getVaccines();
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [])


    return (
        <>
        <PageHeader onBack={()=>window.history.back()} title={params.country} subTitle="Casos e vacina"/>
        {loading ? <Spin/> : 
            <Tabs defaultActiveKey="1">
                <TabPane tab="Casos" key="1">
                
                <Collapse accordion defaultActiveKey="0">
                    {Object.keys(cases).map((c, index) => {
                        return(
                            <Panel header={c} key={index}>
                                <p> <b> Confirmados: </b> {cases[c]["confirmed"]}</p>
                                <p> <b> Recuperados: </b> {cases[c]["recovered"]}</p>
                                <p> <b> Mortos: </b> {cases[c]["deaths"]}</p>
                            </Panel>
                        );
                    })}
                </Collapse>
                </TabPane>

                <TabPane tab="Vacinas" key="2">
                    <Collapse accordion defaultActiveKey="0">
                        <Panel header={params.country} key={0}>
                            <p> <b> Confirmados: </b> {vaccines["All"]["population"]}</p>
                            <p> <b> Recuperados: </b> {vaccines["All"]["people_vaccinated"]}</p>
                            <p> <b> Mortos: </b> {vaccines["All"]["people_partially_vaccinated"]}</p>
                        </Panel>
                    </Collapse>
                </TabPane>
            </Tabs>
        }
        
        </>
    );
}

export default Info;