import React from 'react';
import ProjectCard from './ProjectCard';

const ProjectsList = ({ initialProjects }) => {
    const handleViewDetails = (projectId) => {
        const url = window.laravelData.routes.show.replace(':id', projectId);
        window.location.href = url;
    };

    return (
        <div className="row">
            {initialProjects.map(project => (
                <div className="col-md-6 col-lg-4 mb-4" key={project.id}>
                    <ProjectCard 
                        project={project} 
                        onViewDetails={handleViewDetails}
                    />
                </div>
            ))}
        </div>
    );
};

export default ProjectsList;