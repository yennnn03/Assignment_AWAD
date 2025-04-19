import React from 'react';

const ProjectCard = ({ project, onViewDetails }) => {
    return (
        <div className="card mb-4 shadow-sm">
            <div className="card-body">
                <h3 className="card-title">{project.title}</h3>
                <p className="card-text text-muted">
                    {project.description.length > 100 
                        ? `${project.description.substring(0, 100)}...` 
                        : project.description}
                </p>
                <div className="d-flex justify-content-between align-items-center">
                    <span className="badge bg-primary rounded-pill">
                        Budget: ${project.budget.toLocaleString()}
                    </span>
                    <button 
                        onClick={() => onViewDetails(project.id)}
                        className="btn btn-sm btn-outline-secondary"
                    >
                        View Details
                    </button>
                </div>
            </div>
        </div>
    );
};

export default ProjectCard;